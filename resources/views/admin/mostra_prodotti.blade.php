<!DOCTYPE html>
<html lang="it">
    <meta name="csrf-token" content="{{ csrf_token() }}">

@include('admin.header')
<body>

@include('admin.sidebar')

<!-- Main Content -->
<div class="content">
    <div class="container mt-5">
        <!-- Pulsante per aprire il Modal -->
        <center><button type="button" class="btn btn-success mb-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <i class="fas fa-plus-circle"></i> Aggiungi Prodotti
        </button></center>
    
        <!-- Tabella Professionale -->
        <div class="card shadow-lg border-0">
            <div class="card-header bg-gradient text-white bg-primary">
                <h5 class="mb-0">Gestione Prodotti</h5>
            </div>
            <div class="card-body">
                <!-- Aggiunta della classe table-responsive per la responsività -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Immagini</th>
                                <th>Titolo</th>
                                <th>Descrizione</th>
                                <th>Prezzo</th>
                                <th>Categoria</th>
                                <th>Azioni</th>
                            </tr>
                        </thead>
                        <tbody id="data-table-body">
                            <!-- Dati di esempio -->
                            @foreach ($data as $item)
                                <tr class="table-light" id="row-{{$item->id}}">
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->immagine}}</td>
                                    <td>{{$item->titolo}}</td>
                                    <td>{{$item->descrizione}}</td>
                                    <td>{{$item->prezzo}}€</td>
                                    <td>{{$item->categoria}}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm shadow-sm btn-hover" onclick="editCategory({{ $item->id }})">✏️ Modifica</button>
                                        <button class="btn btn-danger btn-sm shadow-sm btn-hover" onclick="deleteCategory({{ $item->id }})">🗑️ Elimina</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal per aggiungere i dati -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Inserisci Categoria Prodotti</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="data-form" action="{{route('add_cat')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control" name="name" required placeholder="Nome Completo">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                    <button type="submit" class="btn btn-primary" id="save-button" form="data-form">Salva</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
@include('admin.footer')
</body>
<script>
    function editCategory(id) {
        const nameElement = document.getElementById(`name-${id}`);
        const currentName = nameElement.innerText;

        // Crea un campo di input per modificare il nome
        const inputField = document.createElement('input');
        inputField.type = 'text';
        inputField.value = currentName;
        inputField.classList.add('form-control');
        inputField.style.width = 'auto';

        // Sostituisci il contenuto con l'input
        nameElement.innerHTML = '';
        nameElement.appendChild(inputField);
        inputField.focus();

        // Salva quando l'utente preme Enter o fa clic fuori dal campo
        inputField.addEventListener('blur', () => submitForm(id, inputField.value));
        inputField.addEventListener('keypress', (event) => {
            if (event.key === 'Enter') {
                submitForm(id, inputField.value);
            }
        });
    }

    function submitForm(id, newName) {
        // Crea un form per inviare la modifica
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/update-category/${id}`;

        // Aggiungi il CSRF token al form
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = csrfToken;
        form.appendChild(csrfInput);

        // Aggiungi il nuovo nome della categoria al form
        const nameInput = document.createElement('input');
        nameInput.type = 'hidden';
        nameInput.name = 'name';
        nameInput.value = newName;
        form.appendChild(nameInput);

        document.body.appendChild(form);  // Aggiungi il form al body
        form.submit();  // Invia il form
    }

    
    function deleteCategory(id) {
    // Chiedi conferma all'utente
    const confirmation = confirm("Sei sicuro di voler eliminare questa categoria?");
    if (!confirmation) return; // Esci se l'utente non conferma

    // Invia la richiesta di eliminazione
    fetch(`/delete/category/${id}`, {
        method: 'DELETE', // Metodo DELETE per eliminare
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // CSRF token
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Errore durante l\'eliminazione');
        }
        // Rimuovi la riga della tabella
        const row = document.getElementById(`row-${id}`);
        row.remove();
    })
    .catch(error => {
        console.error('Errore:', error);
        alert('Impossibile eliminare la categoria. Riprova.');
    });
}
</script>

</html>
