<?php
    $conexao = mysqli_connect('localhost','root','','jobs_bd');
    mysqli_set_charset($conexao, "utf8");

    

 
?>

<!doctype html>
<html lang="pt-pt">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Dashboard Template · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">



    <!-- Bootstrap core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../css/bootstrap-icons.css">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      /* Chart.js */
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}

    </style>


    <!-- Custom styles for this template -->
    <link href="../css/admin.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" charset="UTF-8" href="https://www.gstatic.com/_/translate_http/_/ss/k=translate_http.tr.69JJaQ5G5xA.L.W.O/d=0/rs=AN8SPfpC36MIoWPngdVwZ4RUzeJYZaC7rg/m=el_main_css">
  </head>
  <body>

    <header class="bg-purple navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><h3>JOBS</h3></a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <input class="form-control form-control-dark w-90" type="text" placeholder="Search" aria-label="Search" style="opacity: 0;">
      <div class="navbar-nav">
        <div class="nav-item text-nowrap d-flex align-items-center">
            <a class="nav-link px-3 position-relative" href="#" hidden>
              <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
              </svg>
              <span class="position-absolute top-10 start-60 translate-middle badge border border-light rounded-circle bg-danger p-2"><span class="">3</span></span>
            </a>


            <div class="btn-group position-relative ">
              <div class="btn-group dropstart position-relative d-none" role="group">
                <button type="button" class="btn btn-sm btn-default dropdown-toggle dropdown-toggle-split position-relative" data-bs-toggle="dropdown" aria-expanded="false">
                  <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="white" class="bi bi-bell-fill" viewBox="0 0 16 16">
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                  </svg>
                  <span class="position-absolute top-10 start-60 translate-middle badge border border-light rounded-circle bg-danger p-2"><span class="">3</span></span>

                </button>
                <ul class="dropdown-menu position-absolute">
                  <li class="" data-bs-toggle="modal" data-bs-target="#pagaconta"><a class="dropdown-item" href="#">
                    <i class="bi bi-cash-coin"></i>
                    Solicitação de Servicos <span class="badge border border-light rounded-circle bg-danger"><span class="">3</span></span></a></li>
                  <li><a class="dropdown-item" href="#">
                    <i class="bi bi-calendar-check"></i>
                    Prestadores mais Solisitados
                    <span class="badge border border-light rounded-circle bg-danger"><span class="">3</span></span>
                  </a></li>
                  <li><a class="dropdown-item" href="#">
                    <i class="bi bi-info-square"></i>
                    Aviso</a></li>
                </ul>
              </div>

              <div class="btn-group dropstart position-relative">
                <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="white" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                  </svg>
                </button>
                <ul class="dropdown-menu position-absolute">
                  <li><a class="dropdown-item" href="#">Alterar Perfil</a></li>
                  <li><a class="dropdown-item" href="#">Configuração</a></li>
                  <li><a class="dropdown-item" href="#">Sair da conta</a></li>
                </ul>
              </div>
            </div>
          </div>
      </div>
    </header>



<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
              <a id="btn-home" class="nav-link active" aria-current="page" href="#">
                <span data-feather="" class="align-text-bottom bi bi-shop"></span>
                Inicio
              </a>
            </li>
            <li class="nav-item">
              <a id="btn-venda" class="nav-link" href="cliente.php">
                <span data-feather="file" class="align-text-bottom bi bi-people-fill"></span>
                Clientes
              </a>
            </li>
            <li class="nav-item">
              <a id="btn-prod" class="nav-link" href="prestador.php">
                <span data-feather="shopping-cart" class="align-text-bottom bi bi-people"></span>
                Prestadores
              </a>
            </li>
            <li class="nav-item">
              <a id="btn-clint" class="nav-link" href="servico.php">
                <span data-feather="users" class="align-text-bottom bi bi-buildings-fill"></span>
                Serviços
              </a>
            </li>
            <li class="nav-item d-none">
              <a id="btn-pedir" class="nav-link" href="#">
                <span data-feather="bar-chart-2" class="align-text-bottom bi bi-truck"></span>
                Pedidos
              </a>
            </li>
            <li class="nav-item d-none">
              <a id="btn-fonecer" class="nav-link" href="#">
                <span data-feather="layers" class="align-text-bottom bi bi-bank"></span>
                Fornecedores
              </a>
            </li>
          </ul>


      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Painel</h1>
        <div class="btn-toolbar mb-2 mb-md-0 d-none">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
            <div class="d-flex justify-content-between align-items-center">
                <div class="">
                    <h6 class="text-uppercase text-muted fw-semibold mb-2">Clintes Registrados</h6>
                    <h4 class="mb-0">
                    <?php
                       // Query to count rows in table
                            $sqlConta = "SELECT COUNT(*) as count FROM tb_Cliente";
                            $resultConta = mysqli_query($conexao, $sqlConta);

                            if (mysqli_num_rows($resultConta) > 0) {
                                // Output data of first row
                                $rowContar = mysqli_fetch_assoc($resultConta);
                                echo $rowContar["count"];
                            } else {
                                echo "0 Resultado";
                            }

                          //  mysqli_close($conexao);

                      /*   $sql = "SELECT COUNT(*) as count FROM tb_trabalho";
                         $result = $conn->query($sql); 
                         
                         if ($result->num_rows > 0) {
                             // Output data of first row
                             $row = $result->fetch_assoc();
                             echo "Number of rows: " . $row["count"];
                         } else {
                             echo "0 results";
                         }
                         
                         $conn->close();
                         */
                        ?>
                    </h4>
                </div>
                <div class="">
                    <svg viewBox="0 0 24 24" height="30" width="30" class="text-purple" xmlns="http://www.w3.org/2000/svg"><path d="M2.250 6.000 A2.250 2.250 0 1 0 6.750 6.000 A2.250 2.250 0 1 0 2.250 6.000 Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M4.5,9.75A3.75,3.75,0,0,0,.75,13.5v2.25h1.5l.75,6H6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M17.250 6.000 A2.250 2.250 0 1 0 21.750 6.000 A2.250 2.250 0 1 0 17.250 6.000 Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M19.5,9.75a3.75,3.75,0,0,1,3.75,3.75v2.25h-1.5l-.75,6H18" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M9.000 3.750 A3.000 3.000 0 1 0 15.000 3.750 A3.000 3.000 0 1 0 9.000 3.750 Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M17.25,13.5a5.25,5.25,0,0,0-10.5,0v2.25H9l.75,7.5h4.5l.75-7.5h2.25Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
                <div>
                     <!-- Label -->
                     <p class="fs-6 text-muted text-uppercase mb-0">
                        Solicitação De Serviços
                      </p>

                      <!-- Comment -->
                      <p class="fs-5 fw-bold mb-0">
                        
                        0
                      </p>
                </div>
                <div>
                     <!-- Label -->
                     <p class="fs-6 text-muted text-uppercase mb-0">
                        Pedidos Em Espera
                      </p>

                      <!-- Comment -->
                      <p class="fs-5 fw-bold mb-0">
                          0
                      </p>
                </div>
            </div>

        </div>
        <div class="col-sm-6">
            <div class="d-flex justify-content-between align-items-center">
                <div class="">
                    <h6 class="text-uppercase text-muted fw-semibold mb-2">Prestadores Registrados</h6>
                    <h4 class="mb-0">
                    <?php
                       // Query to count rows in table
                            $sql = "SELECT COUNT(*) as count FROM tb_prestador";
                            $result = mysqli_query($conexao, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                // Output data of first row
                                $row = mysqli_fetch_assoc($result);
                                echo $row["count"];
                            } else {
                                echo "0 results";
                            }

                          //  mysqli_close($conexao);

                      /*   $sql = "SELECT COUNT(*) as count FROM tb_trabalho";
                         $result = $conn->query($sql); 
                         
                         if ($result->num_rows > 0) {
                             // Output data of first row
                             $row = $result->fetch_assoc();
                             echo "Number of rows: " . $row["count"];
                         } else {
                             echo "0 results";
                         }
                         
                         $conn->close();
                         */
                        ?>
                    </h4>
                </div>
                <div class="">
                      <!-- Icon -->
                      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-people-fill text-purple" viewBox="0 0 16 16">
                      <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                    </svg>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
                <div>
                     <!-- Label -->
                     <p class="fs-6 text-muted text-uppercase mb-0">
                        Prestadores Solicitado
                      </p>

                      <!-- Comment -->
                      <p class="fs-5 fw-bold mb-0">
                          0
                      </p>
                </div>
                <div>
                     <!-- Label -->
                     <p class="fs-6 text-muted text-uppercase mb-0">
                        Prestadores Sem Solicitação
                      </p>

                      <!-- Comment -->
                      <p class="fs-5 fw-bold mb-0">
                          0
                      </p>
                </div>
            </div>

        </div>
        <div class="col-sm-6">
            <div class="d-flex justify-content-between align-items-center">
                <div class="">
                    <h6 class="text-uppercase text-muted fw-semibold mb-2">Serviços Cadastrados</h6>
                    <h4 class="mb-0">
                      <?php
                       // Query to count rows in table
                            $sql = "SELECT COUNT(*) as count FROM tb_trabalho";
                            $result = mysqli_query($conexao, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                // Output data of first row
                                $row = mysqli_fetch_assoc($result);
                                echo $row["count"];
                            } else {
                                echo "0 results";
                            }

                          //  mysqli_close($conexao);

                      /*   $sql = "SELECT COUNT(*) as count FROM tb_trabalho";
                         $result = $conn->query($sql); 
                         
                         if ($result->num_rows > 0) {
                             // Output data of first row
                             $row = $result->fetch_assoc();
                             echo "Number of rows: " . $row["count"];
                         } else {
                             echo "0 results";
                         }
                         
                         $conn->close();
                         */
                        ?>
                    </h4>
                </div>
                <div class="">
                      <!-- Icon -->
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="30" width="30" class="text-purple"><defs><style>.a{fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5px;}</style></defs><title>monitor-graph-line</title><polygon class="a" points="15 23.253 9 23.253 9.75 18.753 14.25 18.753 15 23.253"></polygon><line class="a" x1="6.75" y1="23.253" x2="17.25" y2="23.253"></line><rect class="a" x="0.75" y="0.753" width="22.5" height="18" rx="3" ry="3"></rect><path class="a" d="M18.75,5.253H16.717a1.342,1.342,0,0,0-.5,2.588l2.064.825a1.342,1.342,0,0,1-.5,2.587H15.75"></path><line class="a" x1="17.25" y1="5.253" x2="17.25" y2="4.503"></line><line class="a" x1="17.25" y1="12.003" x2="17.25" y2="11.253"></line><path class="a" d="M.75,11.253,4.72,7.284a.749.749,0,0,1,1.06,0L7.72,9.223a.749.749,0,0,0,1.06,0l3.97-3.97"></path><line class="a" x1="0.75" y1="15.753" x2="23.25" y2="15.753"></line></svg>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
                <div>
                     <!-- Label -->
                     <p class="fs-6 text-muted text-uppercase mb-0">
                        Serviços Solicitados
                      </p>

                      <!-- Comment -->
                      <p class="fs-5 fw-bold mb-0">
                          <?php
                             $sql = "SELECT COUNT(*) as count FROM tb_prestador WHERE solicitacao  != '' ORDER BY solicitacao DESC";
                             $result = mysqli_query($conexao, $sql);
 
                             if (mysqli_num_rows($result) > 0) {
                                 // Output data of first row
                                 $row = mysqli_fetch_assoc($result);
                                 echo $row["count"];
                             } else {
                                 echo "0 results";
                             }
                          ?>
                      </p>
                </div>
                <div>
                     <!-- Label -->
                     <p class="fs-6 text-muted text-uppercase mb-0">
                        Serviços Sem Solicitação
                      </p>

                      <!-- Comment -->
                      <p class="fs-5 fw-bold mb-0">
                          <?php
                            $sql1 = "SELECT COUNT(*) as count FROM tb_prestador WHERE solicitacao LIKE NULL OR solicitacao LIKE '' ORDER BY solicitacao DESC";
                            $result1 = mysqli_query($conexao, $sql1);

                            if (mysqli_num_rows($result1) > 0) {
                                // Output data of first row
                                $row1 = mysqli_fetch_assoc($result1);
                                echo $row1["count"];
                            } else {
                                echo "0 results";
                            }
                          ?>
                      </p>
                </div>
            </div>

        </div>
        <div class="col-sm-6">
            <div class="card border-0 text-white flex-fill">
                

                    <!-- Chart -->
                    <div class="chart-container h-70px">
                    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                    </div>
                
            </div>
        </div>

      </div>
      <h2 class="my-2">Prestadores & Serviços Mais Solicitados</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm ">
          <thead >
            <tr>
            <th scope="col">#</th>
              <th scope="col" style="min-width: 150px;">Nome</th>
              <th scope="col" style="">Nº Solicitação</th>
              <th scope="col">Tipo Serviço</th>
              
              
            </tr>
          </thead>
          <tbody>
    <?php
          $sqlBusca1 = "SELECT * FROM tb_prestador WHERE solicitacao  != '' ORDER BY solicitacao DESC";
        $resultado1 = mysqli_query($conexao, $sqlBusca1);
        $tarefas = 0;

      while ($tarefa1 = mysqli_fetch_assoc($resultado1)) {
       // print_r($tarefa1);
       $tarefas++;
    ?>

            <tr>
                <td>
                    <?php echo $tarefas; ?>
               </td>
              <td><img src="img/<?php echo $tarefa1['img_prestador']; ?>" alt="" style="width: 50px; heigth: 50px;" class="rounded-circle img-thumbnail" ><span class="px-1 text-muted"><b>
                <?php echo $tarefa1['nome_prestador']; ?>
              </b></span></td>
              <td>
              <?php echo $tarefa1['solicitacao']; ?>
              </td>
              <td>
              <?php echo $tarefa1['categoria_prestador']; ?>
              </td>
             
              
            </tr>
       <?php
             }
       ?>
          </tbody>
        </table>
      </div>
      </div>
    </main>
  </div>
</div>

<!-- Modal PAGAR CONTA-->
<div class="modal fade" id="pagaconta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pedidos De Conta <span class="badge border border-light rounded-circle bg-danger"><span class="">3</span></span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="" style="">

            <div class="table-responsive">
                <table class="table table-striped table-sm ">
                  <thead >
                    <tr>
                        <th scope="col">#</th>
                      <th scope="col" style="min-width: 150px;">Nome Cliente</th>
                      <th scope="col">Valor a pagar</th>

                      <th scope="col" style="min-width: 100px;">Tipo de pagamento</th>
                      <th scope="col">Atender</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>1</td>
                      <td><img src="img/bebo6.JPG" alt=""><span class="px-1 text-muted"><b>Vivaldo</b></span></td>
                      <td>2500.000.00</td>
                      <td>
                        Dinheiro em mão
                      </td>
                      <td>
                        <a href="#" class="">
                          <i class="bi bi-check2-all" style="font-size: 21px;"></i>
                          </a>
                      </td>
                    </tr>
                    <tr>
                        <td>2</td>
                      <td><img src="img/celestino.PNG" alt=""><span class="px-1 text-muted"><b>Simão</b></span></td>
                      <td>1500.000.00</td>

                      <td>
                        Cartão de credito
                      </td>
                      <td>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">

                          </div>
                      </td>
                    </tr>
                    <tr>
                        <td>3</td>
                      <td><img src="img/pic12.JPG" alt=""><span class="px-1 text-muted"><b>Bife</b></span></td>
                      <td>3</td>

                      <td>
                        500.000.00
                      </td>
                      <td>
                        <a href="#">
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">

                              </div>
                        </a>
                      </td>
                    </tr>
                    <tr>
                        <td>4</td>
                      <td><img src="img/pic3.JPG" alt=""><span class="px-1 text-muted"><b>Sopa</b></span></td>
                      <td>4</td>

                      <td>
                        50.000.00
                      </td>
                      <td><a href="#">
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">

                          </div>
                      </a></td>
                    </tr>
                    <tr>
                        <td>5</td>
                      <td><img src="img/meio corpo1.png" alt=""><span class="px-1 text-muted"><b>Calulu</b></span></td>
                      <td>2</td>

                      <td class="">
                        100.000.00
                      </td>
                      <td class="">
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">

                          </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

        </div>
        <div class="modal-footer d-none">
          <button type="button" class="btn btn-dark d-none" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-purple">Efetuar Entrega</button>
        </div>
      </div>
    </div>
  </div>
<!-- Modal Mesas-->
<div class="modal fade" id="mesas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pedidos Para Mesa Nº <span class="bg-dark text-light p-1" style="border-radius: 100%;">3</span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="" style="">
            <p>
                <img src="img/pic3.JPG" alt=""><span class="px-1 text-muted"><b>Celestino Fagoso</b></span>
            </p>
            <div class="table-responsive">
                <table class="table table-striped table-sm ">
                  <thead >
                    <tr>
                        <th scope="col">#</th>
                      <th scope="col" style="min-width: 150px;">Prato</th>
                      <th scope="col">Nº de Partos</th>

                      <th scope="col" style="min-width: 100px;">Valor A Pagar</th>
                      <th scope="col">Feito</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>1</td>
                      <td><img src="img/bebo6.JPG" alt=""><span class="px-1 text-muted"><b>Arroz Com Kizaka</b></span></td>
                      <td>2</td>
                      <td>
                        500.000.00
                      </td>
                      <td>
                        <a href="#" class="">
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">

                              </div>
                          </a>
                      </td>
                    </tr>
                    <tr>
                        <td>2</td>
                      <td><img src="img/celestino.PNG" alt=""><span class="px-1 text-muted"><b>Funge com Fumbua</b></span></td>
                      <td>1</td>

                      <td>
                        500.000.00
                      </td>
                      <td>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">

                          </div>
                      </td>
                    </tr>
                    <tr>
                        <td>3</td>
                      <td><img src="img/pic12.JPG" alt=""><span class="px-1 text-muted"><b>Bife</b></span></td>
                      <td>3</td>

                      <td>
                        500.000.00
                      </td>
                      <td>
                        <a href="#">
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">

                              </div>
                        </a>
                      </td>
                    </tr>
                    <tr>
                        <td>4</td>
                      <td><img src="img/pic3.JPG" alt=""><span class="px-1 text-muted"><b>Sopa</b></span></td>
                      <td>4</td>

                      <td>
                        50.000.00
                      </td>
                      <td><a href="#">
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">

                          </div>
                      </a></td>
                    </tr>
                    <tr>
                        <td>5</td>
                      <td><img src="img/meio corpo1.png" alt=""><span class="px-1 text-muted"><b>Calulu</b></span></td>
                      <td>2</td>

                      <td class="">
                        100.000.00
                      </td>
                      <td class="">
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">

                          </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div>
                <h4>Conta Total: 1572 KZ</h4>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark d-none" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-purple">Efetuar Entrega</button>
        </div>
      </div>
    </div>
  </div>


  </body>
  <script src="../js/jquery-3.5.1.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
   <script src="../js/admin.js"></script>
   <script>
    var xValues = ["Total", "Masculino", "Feminino"];
    
var yValues = [80, 30, 50];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: ''
        
      
    }
  }
});
   </script>
</html>
