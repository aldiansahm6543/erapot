<div id="content">
      <nav class="navbar navbar-expand-lg navbar-light bg-white ml-auto">
        <div class="container-fluid ">

          <button type="button" id="sidebarCollapse" class="btn btn-info sidebtn">
            <i class="fas fa-align-justify"></i>
          </button>

          <!-- Nav Item - User Information -->
          <div class="dropdown ml-auto">
            <button class="btn dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <h4 class="mr-2 mt-1"><?= $this->session->userdata('level'); ?> </h4><i class="fas fa-user-circle circle"></i>
            </button>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow mt-1" aria-labelledby="userDropdown">
              <?php if ($this->session->userdata('level') == 'walimurid' ): ?>
                <a class="dropdown-item" href="<?= base_url('siswa/profil/edit') ?>">   
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Edit profil
                </a>
              <?php elseif($this->session->userdata('level') == 'guru' ): ?> 
                <a class="dropdown-item" href="<?= base_url('guru/profil/edit') ?>"> 
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                 Edit profil
                </a>
              <?php else: ?>
              <?php endif; ?>
                
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </div>
          </div>

        </div>
      </nav>
      <?php if ($this->session->flashdata('info')): ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
             <?= $this->session->flashdata('info'); ?> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
      <?php endif;     ?>
       <h2><?= $judul ?></h2>