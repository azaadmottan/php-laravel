<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentee Dashboard ({{ Auth::guard('mentee')->user()->menteeName }})</title>
    <link rel="shortcut icon" href="http://www.srisaigroup.in/favicon.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        
        .footer {
            width: 100%;
            background-color: #343a40; 
            color: #fff; 
            font-weight: 400;
            text-align: center;
            border-radius: 10px;
            padding: 10px;
        }
        .sidebar {
            height: 93vh;
            position: sticky;
            top: 55px;
        }

        .sidebar p {
            margin: 5px 0px;
        }
        .sidebar>p>a {
            width: 100%;
            padding: 10px;
            font-size: 17 me-2px;
            text-decoration: none;
            color: #fff; 
            display: block;
        }
        
        .sidebar>p:hover {
            border-radius: 8px;
            background-color: #495057; 
        }

    </style>
</head>
<body>

<!-- Header -->
<nav class="navbar navbar-expand-lg bg-dark sticky-top" data-bs-theme="dark">
    <div class="container-fluid d-flex justify-content-between">
        <a class="navbar-brand" href="{{ route('home') }}">Sri Sai Group of Institute</a>
        
        <div class="btn-group">
            <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                <i class="fa-solid fa-list"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-lg-end">
                <li><a class="dropdown-item me-2" href=""><i class="fa-solid me-2
                    me-2 fa-user"></i>Profile</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa-solid me-2 fa-gear"></i>Settings</a></li>
            <li><a class="dropdown-item" href="{{ route('logoutMentee') }}"><i class="fa-solid me-2 fa-right-from-bracket"></i>Logout</a></li>

            </ul>
        </div>
    </div>
</nav>

<div class="main-section d-flex flex-md-row flex-col">

    <!-- Sidebar -->
    <div class="sidebar col-md-2 bg-dark p-3 flex-col">
        <p class="item">
            <a href="#"><i class="fas fa-home me-2"></i> Home</a>
        </p>
        <p class="item">
            <a href="">
                <i class="fa-solid fa-clipboard-question me-3"></i>Queries
            </a>
        </p>
        <p class="item">
            <a href="">
                <i class="fa-solid fa-angles-right me-3"></i>More
            </a>
        </p>
        <p class="item">
            <a href="#"><i class="fas fa-chart-bar me-2"></i> Analytics</a>
        </p>
    </div>
    
    <!-- Content -->
    <div class="content col-md-10 p-3">
        <h2>Dashboard Home</h2>
        <div>
            <span class="fw-bold fs-4">
                Hey, @if(Auth()->guard('mentee')->check())
                {{ auth()->guard('mentee')->user()->menteeName }}
                @else
                    Guest
                @endif
            </span>
        </div>
        <p>Welcome to the dashboard!</p>
        
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rerum facere culpa molestias remprovident consectetur alias inventore. Excepturi vero eos nobis odit adipisci id cum quis, nam ut numquam! Delectus voluptas velit atque officia ipsum iusto nobis consectetur veritatis quam deserunt ab ea maxime amet recusandae cumque incidunt cupiditate id sint quibusdam, error veniam nihil ex suscipit? Dolorum similique placeat doloribus, itaque debitis eius tempora, temporibus commodi, illo animi adipisci! Quibusdam omnis sunt aut dolores architecto cumque, fugiat libero distinctio? Fuga cum laudantium expedita alias est dolorem quia! Blanditiis, temporibus eveniet cum possimus perspiciatis, pariatur quo vero inventore quidem placeat corporis officia fuga, ducimus nemo id eos dolorum? Et non officiis quos ab iste animi assumenda illum itaque, nisi, reprehenderit placeat molestias. Totam, magni accusantium. Maxime temporibus et voluptas obcaecati ducimus, id molestiae, alias vel quidem tempora, velit adipisci accusantium. Cupiditate id, ullam, nemo deserunt totam deleniti numquam placeat beatae impedit iusto ea eaque illum, odio esse reiciendis nulla doloremque suscipit enim facilis sit similique atque. Saepe laborum incidunt at aut rem tenetur ipsa quas, ducimus numquam officiis. Quam, sunt iusto dolorem dolores eaque saepe aspernatur cumque odit quas id porro, laboriosam suscipit, eos distinctio. Voluptatibus rerum perferendis a nesciunt asperiores cumque modi porro suscipit! Deleniti, perspiciatis nulla aliquid necessitatibus ipsa eius magni, sapiente nemo iure expedita autem quod repellat ad dolor velit soluta recusandae quas dignissimos iste repudiandae! Voluptas quis dignissimos, voluptatibus aliquid praesentium consequuntur. Ut animi in possimus! Ex inventore quasi cupiditate ratione odio corrupti asperiores porro excepturi in autem veniam eligendi perferendis quo fugiat voluptas consequuntur id, laborum iste exercitationem eum dolore doloribus. Corrupti asperiores, mollitia dolor accusamus repudiandae, ratione fugit alias in commodi fugiat dolore sunt rerum eaque a voluptates numquam, neque quaerat pariatur quo temporibus provident aspernatur? Tempore velit quisquam recusandae distinctio, iusto, pariatur natus ex nobis voluptate temporibus laudantium enim. Obcaecati laborum mollitia nulla minus omnis adipisci voluptatum sapiente, fugiat voluptate culpa aperiam esse dicta repellat tempora provident corrupti sint odio nemo iure enim ullam expedita veniam nesciunt quo. Minus nam sed corrupti libero quo fugit eligendi deserunt eum veritatis culpa, est molestias error explicabo corporis recusandae unde aliquid debitis. Ea blanditiis quod temporibus facilis iste eius rerum! Illo voluptates accusantium id quaerat aliquid reiciendis voluptatibus iste!</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rerum facere culpa molestias remprovident consectetur alias inventore. Excepturi vero eos nobis odit adipisci id cum quis, nam ut numquam! Delectus voluptas velit atque officia ipsum iusto nobis consectetur veritatis quam deserunt ab ea maxime amet recusandae cumque incidunt cupiditate id sint quibusdam, error veniam nihil ex suscipit? Dolorum similique placeat doloribus, itaque debitis eius tempora, temporibus commodi, illo animi adipisci! Quibusdam omnis sunt aut dolores architecto cumque, fugiat libero distinctio? Fuga cum laudantium expedita alias est dolorem quia! Blanditiis, temporibus eveniet cum possimus perspiciatis, pariatur quo vero inventore quidem placeat corporis officia fuga, ducimus nemo id eos dolorum? Et non officiis quos ab iste animi assumenda illum itaque, nisi, reprehenderit placeat molestias. Totam, magni accusantium. Maxime temporibus et voluptas obcaecati ducimus, id molestiae, alias vel quidem tempora, velit adipisci accusantium. Cupiditate id, ullam, nemo deserunt totam deleniti numquam placeat beatae impedit iusto ea eaque illum, odio esse reiciendis nulla doloremque suscipit enim facilis sit similique atque. Saepe laborum incidunt at aut rem tenetur ipsa quas, ducimus numquam officiis. Quam, sunt iusto dolorem dolores eaque saepe aspernatur cumque odit quas id porro, laboriosam suscipit, eos distinctio. Voluptatibus rerum perferendis a nesciunt asperiores cumque modi porro suscipit! Deleniti, perspiciatis nulla aliquid necessitatibus ipsa eius magni, sapiente nemo iure expedita autem quod repellat ad dolor velit soluta recusandae quas dignissimos iste repudiandae! Voluptas quis dignissimos, voluptatibus aliquid praesentium consequuntur. Ut animi in possimus! Ex inventore quasi cupiditate ratione odio corrupti asperiores porro excepturi in autem veniam eligendi perferendis quo fugiat voluptas consequuntur id, laborum iste exercitationem eum dolore doloribus. Corrupti asperiores, mollitia dolor accusamus repudiandae, ratione fugit alias in commodi fugiat dolore sunt rerum eaque a voluptates numquam, neque quaerat pariatur quo temporibus provident aspernatur? Tempore velit quisquam recusandae distinctio, iusto, pariatur natus ex nobis voluptate temporibus laudantium enim. Obcaecati laborum mollitia nulla minus omnis adipisci voluptatum sapiente, fugiat voluptate culpa aperiam esse dicta repellat tempora provident corrupti sint odio nemo iure enim ullam expedita veniam nesciunt quo. Minus nam sed corrupti libero quo fugit eligendi deserunt eum veritatis culpa, est molestias error explicabo corporis recusandae unde aliquid debitis. Ea blanditiis quod temporibus facilis iste eius rerum! Illo voluptates accusantium id quaerat aliquid reiciendis voluptatibus iste!</p>
        <!-- Footer -->
        <div class="footer">
            <p>&copy; 2022 Dashboard. All rights reserved.</p>
        </div>
    </div>

</div>


<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
