<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f6f9;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #343a40;
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 50px;
            transition: all 0.3s;
        }
        .sidebar .nav-link {
            color: #ddd;
        }
        .sidebar .nav-link.active {
            background-color: #495057;
            color: #fff;
        }
        .sidebar .nav-link:hover {
            background-color: #495057;
        }
        .sidebar-footer {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            color: #bbb;
        }
        .content {
            margin-left: 250px;
            padding: 30px;
            transition: margin-left 0.3s;
        }
        .content .row {
            margin-bottom: 20px;
        }
        .profile-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }
        .profile-card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }
        /* Responsività */
        @media (max-width: 991px) {
            .sidebar {
                width: 200px;
                left: -200px;
                z-index: 1;
            }
            .sidebar.active {
                left: 0;
            }
            .content {
                margin-left: 0;
            }
            .sidebar-toggle {
                display: block;
                position: absolute;
                top: 20px;
                left: 20px;
                z-index: 2;
            }
        }
        @media (max-width: 767px) {
            .sidebar {
                width: 150px;
            }
            .content {
                margin-left: 0;
            }
        }
    </style>
</head>