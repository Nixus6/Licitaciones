<!-- <style>
  #cd-timeline {
    position: relative;
    padding: 2em 0;
    /* margin-top: 2em;
    margin-bottom: 2em; */
  }

  #cd-timeline::before {
    content: '';
    position: absolute;
    top: 0;
    /* left: 18px; */
    height: 100%;
    width: 4px;
    background: #d7e4ed;
  }

  .cd-container {
    width: 90%;
    max-width: 1170px;
    margin: 0 auto;
  }

  .cd-container::after {
    content: '';
    display: table;
    clear: both;
  }

  .cd-timeline-block:first-child {
    margin-top: 0;
  }

  .cd-timeline-block {
    position: relative;
    margin: 2em 0;
  }

  .cd-timeline-block::after {
    content: "";
    display: table;
    clear: both;
  }

  .cd-timeline-img {
    position: absolute;
    top: 0;
    left: 0;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    box-shadow: 0 0 0 4px rgba(0, 0, 0, .09);
  }

  .cd-timeline-img img {
    display: block;
    width: 40px;
    height: 40px;
    position: relative;
    border-radius: 50%;
  }

  .cd-timeline-content {
    position: relative;
    margin-left: 60px;
    border-radius: 0.25em;
    padding: 1em;
    background-color: #01579B;
    color: #fff;
  }

  .cd-timeline-content::before {
    content: '';
    position: absolute;
    top: 16px;
    right: 100%;
    height: 0;
    width: 0;
    border: 7px solid transparent;
    border-right: 7px solid #01579B;
  }

  .cd-timeline-content .cd-date {
    display: inline-block;
  }

  .cd-timeline-content .cd-date {
    float: left;
    padding: .8em 0;
  }

  .cd-timeline-content::after {
    content: "";
    display: table;
    clear: both;
  }
</style> -->
<style>
  /*TimeLine*/
  .cd-container {
    width: 90%;
    max-width: 1170px;
    margin: 0 auto;
  }

  .cd-container::after {
    content: '';
    display: table;
    clear: both;
  }

  #cd-timeline {
    position: relative;
    padding: 2em 0;
    margin-top: 2em;
    margin-bottom: 2em;
  }

  #cd-timeline::before {
    content: '';
    position: absolute;
    top: 0;
    left: 18px;
    height: 100%;
    width: 4px;
    background: #d7e4ed;
  }

  .cd-timeline-block {
    position: relative;
    margin: 2em 0;
  }

  .cd-timeline-block::after {
    content: "";
    display: table;
    clear: both;
  }

  .cd-timeline-block:first-child {
    margin-top: 0;
  }

  .cd-timeline-block:last-child {
    margin-bottom: 0;
  }

  .cd-timeline-img {
    position: absolute;
    top: 0;
    left: 0;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    box-shadow: 0 0 0 4px rgba(0, 0, 0, .09);
  }

  .cd-timeline-img img {
    display: block;
    width: 40px;
    height: 40px;
    position: relative;
    border-radius: 50%;
  }

  .cd-timeline-content {
    position: relative;
    margin-left: 60px;
    border-radius: 0.25em;
    padding: 1em;
    background-color: #01579B;
    color: #fff;
  }

  .cd-timeline-content::after {
    content: "";
    display: table;
    clear: both;
  }

  .cd-timeline-content .cd-date {
    display: inline-block;
  }

  .cd-timeline-content p {
    margin: 1em 0;
    line-height: 1.6;
  }

  .cd-timeline-content .cd-date {
    float: left;
    padding: .8em 0;
  }

  .cd-timeline-content::before {
    content: '';
    position: absolute;
    top: 16px;
    right: 100%;
    height: 0;
    width: 0;
    border: 7px solid transparent;
    border-right: 7px solid #01579B;
  }

  @media (min-width: 1200px) {
    #cd-timeline {
      margin-top: 3em;
      margin-bottom: 3em;
    }

    #cd-timeline::before {
      left: 50%;
      margin-left: -2px;
    }

    .cd-timeline-block {
      margin: 4em 0;
    }

    .cd-timeline-block:first-child {
      margin-top: 0;
    }

    .cd-timeline-block:last-child {
      margin-bottom: 0;
    }

    .cd-timeline-img {
      width: 60px;
      height: 60px;
      left: 50%;
      margin-left: -30px;
      -webkit-transform: translateZ(0);
      -webkit-backface-visibility: hidden;
    }

    .cd-timeline-img img {
      width: 60px;
      height: 60px;
    }

    .cd-timeline-content .cd-date {
      color: #01579B;
    }

    .cd-timeline-content {
      margin-left: 0;
      width: 45%;
    }

    .cd-timeline-content::before {
      top: 24px;
      left: 100%;
      border-color: transparent;
      border-left-color: #01579B;
    }

    .cd-timeline-content .cd-date {
      position: absolute;
      width: 100%;
      left: 122%;
      top: 6px;
      font-size: 16px;
      font-size: 1rem;
    }

    .cd-timeline-block:nth-child(even) .cd-timeline-content {
      float: right;
    }

    .cd-timeline-block:nth-child(even) .cd-timeline-content::before {
      top: 24px;
      left: auto;
      right: 100%;
      border-color: transparent;
      border-right-color: #01579B;
    }

    .cd-timeline-block:nth-child(even) .cd-timeline-content .cd-date {
      left: auto;
      right: 122%;
      text-align: right;
    }
  }
</style>
<div class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-md-12">
        <div class="card ">

          <div class="card-header">
            <h1>Sistema <small>Bitacora</small></h1>
          </div>

          <div class="card-body">
            <p class="lead text-center">Últimos 15 usuarios que iniciaron sesión en el sistema</p>
            <section id="cd-timeline" class="cd-container">
              <div class="cd-timeline-block">
                <div class="cd-timeline-img">
                  <img src="http://carlossrcb.eshost.com.ar/SBPV1/vistas/assets/avatars/Male3Avatar.png" alt="user-picture" class="mCS_img_loaded">
                </div>
                <div class="cd-timeline-content">
                  <h4 class="text-center text-titles">3 - Wilmar Mira</h4>
                  <h4 class="text-center text-titles">Administrador (Administrador)</h4>
                  <p class="text-center">
                    <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Inicio: <em>10:17:37 pm</em> &nbsp;&nbsp;&nbsp;
                    <i class="zmdi zmdi-time zmdi-hc-fw"></i> Finalización: <em>10:22:24 pm</em>
                  </p>
                  <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 09/06/2020</span>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- <div class="content">
  <div class="container-fluid">
    <div class="page-header">
      <h1 class="text-titles">Sistema <small>Bitacora</small></h1>
    </div>
    <p class="lead text-center">Últimos 15 usuarios que iniciaron sesión en el sistema</p>
    <section id="cd-timeline" class="cd-container">

      <div class="cd-timeline-block">
        <div class="cd-timeline-img">
          <img src="http://carlossrcb.eshost.com.ar/SBPV1/vistas/assets/avatars/Male3Avatar.png" alt="user-picture" class="mCS_img_loaded">
        </div>
        <div class="cd-timeline-content">
          <h4 class="text-center text-titles">1 - Wilmar Mira</h4>
          <h4 class="text-center text-titles">Administrador (Administrador)</h4>
          <p class="text-center">
            <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Inicio: <em>04:48:35 pm</em> &nbsp;&nbsp;&nbsp;
            <i class="zmdi zmdi-time zmdi-hc-fw"></i> Finalización: <em>Sin registro</em>
          </p>
          <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 11/06/2020</span>
        </div>
      </div>

      <div class="cd-timeline-block">
        <div class="cd-timeline-img">
          <img src="http://carlossrcb.eshost.com.ar/SBPV1/vistas/assets/avatars/Male3Avatar.png" alt="user-picture" class="mCS_img_loaded">
        </div>
        <div class="cd-timeline-content">
          <h4 class="text-center text-titles">2 - Wilmar Mira</h4>
          <h4 class="text-center text-titles">Administrador (Administrador)</h4>
          <p class="text-center">
            <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Inicio: <em>12:46:04 pm</em> &nbsp;&nbsp;&nbsp;
            <i class="zmdi zmdi-time zmdi-hc-fw"></i> Finalización: <em>Sin registro</em>
          </p>
          <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 10/06/2020</span>
        </div>
      </div>

      <div class="cd-timeline-block">
        <div class="cd-timeline-img">
          <img src="http://carlossrcb.eshost.com.ar/SBPV1/vistas/assets/avatars/Male3Avatar.png" alt="user-picture" class="mCS_img_loaded">
        </div>
        <div class="cd-timeline-content">
          <h4 class="text-center text-titles">3 - Wilmar Mira</h4>
          <h4 class="text-center text-titles">Administrador (Administrador)</h4>
          <p class="text-center">
            <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Inicio: <em>10:17:37 pm</em> &nbsp;&nbsp;&nbsp;
            <i class="zmdi zmdi-time zmdi-hc-fw"></i> Finalización: <em>10:22:24 pm</em>
          </p>
          <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 09/06/2020</span>
        </div>
      </div>

      <div class="cd-timeline-block">
        <div class="cd-timeline-img">
          <img src="http://carlossrcb.eshost.com.ar/SBPV1/vistas/assets/avatars/Male3Avatar.png" alt="user-picture" class="mCS_img_loaded">
        </div>
        <div class="cd-timeline-content">
          <h4 class="text-center text-titles">4 - Wilmar Mira</h4>
          <h4 class="text-center text-titles">Administrador (Administrador)</h4>
          <p class="text-center">
            <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Inicio: <em>05:17:57 pm</em> &nbsp;&nbsp;&nbsp;
            <i class="zmdi zmdi-time zmdi-hc-fw"></i> Finalización: <em>05:18:34 pm</em>
          </p>
          <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 09/06/2020</span>
        </div>
      </div>

      <div class="cd-timeline-block">
        <div class="cd-timeline-img">
          <img src="http://carlossrcb.eshost.com.ar/SBPV1/vistas/assets/avatars/Male3Avatar.png" alt="user-picture" class="mCS_img_loaded">
        </div>
        <div class="cd-timeline-content">
          <h4 class="text-center text-titles">5 - Wilmar Mira</h4>
          <h4 class="text-center text-titles">Administrador (Administrador)</h4>
          <p class="text-center">
            <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Inicio: <em>05:11:50 pm</em> &nbsp;&nbsp;&nbsp;
            <i class="zmdi zmdi-time zmdi-hc-fw"></i> Finalización: <em>05:17:55 pm</em>
          </p>
          <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 09/06/2020</span>
        </div>
      </div>

      <div class="cd-timeline-block">
        <div class="cd-timeline-img">
          <img src="http://carlossrcb.eshost.com.ar/SBPV1/vistas/assets/avatars/Male3Avatar.png" alt="user-picture" class="mCS_img_loaded">
        </div>
        <div class="cd-timeline-content">
          <h4 class="text-center text-titles">6 - Wilmar Mira</h4>
          <h4 class="text-center text-titles">Administrador (Administrador)</h4>
          <p class="text-center">
            <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Inicio: <em>12:00:16 pm</em> &nbsp;&nbsp;&nbsp;
            <i class="zmdi zmdi-time zmdi-hc-fw"></i> Finalización: <em>Sin registro</em>
          </p>
          <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 09/06/2020</span>
        </div>
      </div>

      <div class="cd-timeline-block">
        <div class="cd-timeline-img">
          <img src="http://carlossrcb.eshost.com.ar/SBPV1/vistas/assets/avatars/Male3Avatar.png" alt="user-picture" class="mCS_img_loaded">
        </div>
        <div class="cd-timeline-content">
          <h4 class="text-center text-titles">7 - Wilmar Mira</h4>
          <h4 class="text-center text-titles">Administrador (Administrador)</h4>
          <p class="text-center">
            <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Inicio: <em>07:46:01 am</em> &nbsp;&nbsp;&nbsp;
            <i class="zmdi zmdi-time zmdi-hc-fw"></i> Finalización: <em>Sin registro</em>
          </p>
          <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 09/06/2020</span>
        </div>
      </div>

      <div class="cd-timeline-block">
        <div class="cd-timeline-img">
          <img src="http://carlossrcb.eshost.com.ar/SBPV1/vistas/assets/avatars/Male3Avatar.png" alt="user-picture" class="mCS_img_loaded">
        </div>
        <div class="cd-timeline-content">
          <h4 class="text-center text-titles">8 - Wilmar Mira</h4>
          <h4 class="text-center text-titles">Administrador (Administrador)</h4>
          <p class="text-center">
            <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Inicio: <em>05:35:29 am</em> &nbsp;&nbsp;&nbsp;
            <i class="zmdi zmdi-time zmdi-hc-fw"></i> Finalización: <em>Sin registro</em>
          </p>
          <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 09/06/2020</span>
        </div>
      </div>

      <div class="cd-timeline-block">
        <div class="cd-timeline-img">
          <img src="http://carlossrcb.eshost.com.ar/SBPV1/vistas/assets/avatars/Male3Avatar.png" alt="user-picture" class="mCS_img_loaded">
        </div>
        <div class="cd-timeline-content">
          <h4 class="text-center text-titles">9 - Wilmar Mira</h4>
          <h4 class="text-center text-titles">Administrador (Administrador)</h4>
          <p class="text-center">
            <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Inicio: <em>12:27:42 am</em> &nbsp;&nbsp;&nbsp;
            <i class="zmdi zmdi-time zmdi-hc-fw"></i> Finalización: <em>Sin registro</em>
          </p>
          <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 09/06/2020</span>
        </div>
      </div>

      <div class="cd-timeline-block">
        <div class="cd-timeline-img">
          <img src="http://carlossrcb.eshost.com.ar/SBPV1/vistas/assets/avatars/Male3Avatar.png" alt="user-picture" class="mCS_img_loaded">
        </div>
        <div class="cd-timeline-content">
          <h4 class="text-center text-titles">10 - Wilmar Mira</h4>
          <h4 class="text-center text-titles">Administrador (Administrador)</h4>
          <p class="text-center">
            <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Inicio: <em>11:25:02 pm</em> &nbsp;&nbsp;&nbsp;
            <i class="zmdi zmdi-time zmdi-hc-fw"></i> Finalización: <em>Sin registro</em>
          </p>
          <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 08/06/2020</span>
        </div>
      </div>

      <div class="cd-timeline-block">
        <div class="cd-timeline-img">
          <img src="http://carlossrcb.eshost.com.ar/SBPV1/vistas/assets/avatars/Male3Avatar.png" alt="user-picture" class="mCS_img_loaded">
        </div>
        <div class="cd-timeline-content">
          <h4 class="text-center text-titles">11 - Wilmar Mira</h4>
          <h4 class="text-center text-titles">Administrador (Administrador)</h4>
          <p class="text-center">
            <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Inicio: <em>02:53:31 pm</em> &nbsp;&nbsp;&nbsp;
            <i class="zmdi zmdi-time zmdi-hc-fw"></i> Finalización: <em>Sin registro</em>
          </p>
          <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 08/06/2020</span>
        </div>
      </div>

      <div class="cd-timeline-block">
        <div class="cd-timeline-img">
          <img src="http://carlossrcb.eshost.com.ar/SBPV1/vistas/assets/avatars/Male3Avatar.png" alt="user-picture" class="mCS_img_loaded">
        </div>
        <div class="cd-timeline-content">
          <h4 class="text-center text-titles">12 - Wilmar Mira</h4>
          <h4 class="text-center text-titles">Administrador (Administrador)</h4>
          <p class="text-center">
            <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Inicio: <em>10:11:04 pm</em> &nbsp;&nbsp;&nbsp;
            <i class="zmdi zmdi-time zmdi-hc-fw"></i> Finalización: <em>Sin registro</em>
          </p>
          <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 07/06/2020</span>
        </div>
      </div>

      <div class="cd-timeline-block">
        <div class="cd-timeline-img">
          <img src="http://carlossrcb.eshost.com.ar/SBPV1/vistas/assets/avatars/Male3Avatar.png" alt="user-picture" class="mCS_img_loaded">
        </div>
        <div class="cd-timeline-content">
          <h4 class="text-center text-titles">13 - Wilmar Mira</h4>
          <h4 class="text-center text-titles">Administrador (Administrador)</h4>
          <p class="text-center">
            <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Inicio: <em>06:31:11 pm</em> &nbsp;&nbsp;&nbsp;
            <i class="zmdi zmdi-time zmdi-hc-fw"></i> Finalización: <em>Sin registro</em>
          </p>
          <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 07/06/2020</span>
        </div>
      </div>

      <div class="cd-timeline-block">
        <div class="cd-timeline-img">
          <img src="http://carlossrcb.eshost.com.ar/SBPV1/vistas/assets/avatars/Male3Avatar.png" alt="user-picture" class="mCS_img_loaded">
        </div>
        <div class="cd-timeline-content">
          <h4 class="text-center text-titles">14 - Wilmar Mira</h4>
          <h4 class="text-center text-titles">Administrador (Administrador)</h4>
          <p class="text-center">
            <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Inicio: <em>06:19:45 pm</em> &nbsp;&nbsp;&nbsp;
            <i class="zmdi zmdi-time zmdi-hc-fw"></i> Finalización: <em>Sin registro</em>
          </p>
          <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 07/06/2020</span>
        </div>
      </div>

      <div class="cd-timeline-block">
        <div class="cd-timeline-img">
          <img src="http://carlossrcb.eshost.com.ar/SBPV1/vistas/assets/avatars/Male3Avatar.png" alt="user-picture" class="mCS_img_loaded">
        </div>
        <div class="cd-timeline-content">
          <h4 class="text-center text-titles">15 - Wilmar Mira</h4>
          <h4 class="text-center text-titles">Administrador (Administrador)</h4>
          <p class="text-center">
            <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Inicio: <em>12:12:47 pm</em> &nbsp;&nbsp;&nbsp;
            <i class="zmdi zmdi-time zmdi-hc-fw"></i> Finalización: <em>Sin registro</em>
          </p>
          <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 07/06/2020</span>
        </div>
      </div>

    </section>
  </div>
</div> -->