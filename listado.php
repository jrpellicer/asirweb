<!doctype html>
<html lang="es">
    <head>
        <title>Proyecto Intermodular</title>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    
        <link rel="stylesheet" href="assets/css/styles.css" type="text/css">
    </head>

    <body>
        <!-- DATABASE CONFIG -->
        <?php
            // Mostrar todos los errores (útil para debugging)
            ini_set('display_errors', 1);
            error_reporting(E_ALL);

            // Conectar a la base de datos
            // Cambiar el servername por el que proceda: localhost, mysql (docker), dirección IP, cadena de Azure Mysql
            $servername = "mysql";
            $username = "asirweb";
            $password = "qwe_123";
            $dbname = "webasir";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verificar la conexión
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

        ?>

        <header>

            <nav class="navbar navbar-expand-sm navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand" href="./index.html">
                        <img src="assets/images/space.png" height="32px" alt="space" >
                        CFGS ASIR
                    </a>
                    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Presencial <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Semipresencial</a>
                            </li>
                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownId">
                                    <a class="dropdown-item" href="#">Action 1</a>
                                    <a class="dropdown-item" href="#">Action 2</a>
                                </div>
                            </li> -->
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
        </header>      
        
        
        <main>

            <br>
            
            <div class="container">
                <nav class="breadcrumb">
                    <a class="breadcrumb-item" href="#">Formación profesional</a>
                    <a class="breadcrumb-item" href="#">Prácticas en empresa</a>
                    <span class="breadcrumb-item active">Empresas</span>
                </nav>
            </div>


            <div class="container">
                <h3>Empresas para prácticas</h3>
                <hr>
                
                <div
                    class="table-responsive"
                >
                    <table
                        class="table table-secondary"
                    >
                        <thead>
                            <tr>
                                <th>Razón social</th>
                                <th>Descripción</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Consultar los datos
                                $sql = "SELECT * FROM clientes";
                                $result = $conn->query($sql);
                                if ($result === false) {
                                    die("Error en la consulta: " . $conn->error);
                                }
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "  <tr>
                                                    <td>{$row['razon_social']}</td>
                                                    <td>{$row['descripcion']}</td>
                                                    <td>{$row['email']}</td>
                                                    <td>{$row['telefono']}</td>
                                                    <td>
                                                        <div class='btn-group'>
                                                            <a class='btn btn-outline-success btn-sm'><i class='bi bi-telephone-fill'></i> Call</a>
                                                            <a class='btn btn-outline-primary btn-sm'><i class='bi bi-envelope-fill'></i> Mail</a>
                                                        </div>
                                                    </td>
                                                </tr>";
                                    }
                                }            
                            ?>
                        </tbody>
                    </table>
                </div>
                
            </div>

        </main>

        <footer>

            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
              © IES Camp de Morvedre:
              <a class="text-body" href="https://portal.edu.gva.es/iescamp/va/centre/">iescamp</a>
            </div>

        </footer>


          <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>