

              <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom border border-dark">
                <img src="Images/default-user.png" class="navbar-brand border border-primary p-0 m-1" href="#">Bem vindo, <?php echo isset($_SESSION['u_user'])? $_SESSION['u_user']: '';?>!</a>
                
              
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="telaInicial.php">Tela inicial</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="userPanel.php">Minhas informações</a>
                    </li>
                  </ul>
                  <form method="post" action="php/logout.php"> 
                  <button type="submit" class="btn btn-danger mt-3" value="submit">Sair</button>
                  </form>
              </nav>