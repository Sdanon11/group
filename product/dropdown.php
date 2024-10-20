<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Dropdowns · Bootstrap v5.3</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dropdowns/">

    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

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

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dropdowns.css" rel="stylesheet">
  </head>
  <body>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
      <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
      </symbol>
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
      </symbol>
      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
      </symbol>
      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
      </symbol>
    </svg>

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
      <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
              id="bd-theme"
              type="button"
              aria-expanded="false"
              data-bs-toggle="dropdown"
              aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
      </button>
      <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#sun-fill"></use></svg>
            Light
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
            Dark
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#circle-half"></use></svg>
            Auto
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
      </ul>
    </div>

    
<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
  <symbol id="film" viewBox="0 0 16 16">
    <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"/>
  </symbol>

  <symbol id="joystick" viewBox="0 0 16 16">
    <path d="M10 2a2 2 0 0 1-1.5 1.937v5.087c.863.083 1.5.377 1.5.726 0 .414-.895.75-2 .75s-2-.336-2-.75c0-.35.637-.643 1.5-.726V3.937A2 2 0 1 1 10 2z"/>
    <path d="M0 9.665v1.717a1 1 0 0 0 .553.894l6.553 3.277a2 2 0 0 0 1.788 0l6.553-3.277a1 1 0 0 0 .553-.894V9.665c0-.1-.06-.19-.152-.23L9.5 6.715v.993l5.227 2.178a.125.125 0 0 1 .001.23l-5.94 2.546a2 2 0 0 1-1.576 0l-5.94-2.546a.125.125 0 0 1 .001-.23L6.5 7.708l-.013-.988L.152 9.435a.25.25 0 0 0-.152.23z"/>
  </symbol>

  <symbol id="music-note-beamed" viewBox="0 0 16 16">
    <path d="M6 13c0 1.105-1.12 2-2.5 2S1 14.105 1 13c0-1.104 1.12-2 2.5-2s2.5.896 2.5 2zm9-2c0 1.105-1.12 2-2.5 2s-2.5-.895-2.5-2 1.12-2 2.5-2 2.5.895 2.5 2z"/>
    <path fill-rule="evenodd" d="M14 11V2h1v9h-1zM6 3v10H5V3h1z"/>
    <path d="M5 2.905a1 1 0 0 1 .9-.995l8-.8a1 1 0 0 1 1.1.995V3L5 4V2.905z"/>
  </symbol>

  <symbol id="files" viewBox="0 0 16 16">
    <path d="M13 0H6a2 2 0 0 0-2 2 2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 13V4a2 2 0 0 0-2-2H5a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1zM3 4a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4z"/>
  </symbol>

  <symbol id="image-fill" viewBox="0 0 16 16">
    <path d="M.002 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-12a2 2 0 0 1-2-2V3zm1 9v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V9.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12zm5-6.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0z"/>
  </symbol>

  <symbol id="trash" viewBox="0 0 16 16">
    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
  </symbol>

  <symbol id="question-circle" viewBox="0 0 16 16">
    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
    <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
  </symbol>

  <symbol id="arrow-left-short" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
  </symbol>

  <symbol id="arrow-right-short" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
  </symbol>
</svg>

<div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-5 align-items-center justify-content-center">
  <ul class="dropdown-menu position-static d-grid gap-1 p-2 rounded-3 mx-0 shadow w-220px" data-bs-theme="light">
    <li><a class="dropdown-item rounded-2 active" href="#">Action</a></li>
    <li><a class="dropdown-item rounded-2" href="#">Another action</a></li>
    <li><a class="dropdown-item rounded-2" href="#">Something else here</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item rounded-2" href="#">Separated link</a></li>
  </ul>
  <ul class="dropdown-menu position-static d-grid gap-1 p-2 rounded-3 mx-0 border-0 shadow w-220px" data-bs-theme="dark">
    <li><a class="dropdown-item rounded-2 active" href="#">Action</a></li>
    <li><a class="dropdown-item rounded-2" href="#">Another action</a></li>
    <li><a class="dropdown-item rounded-2" href="#">Something else here</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item rounded-2" href="#">Separated link</a></li>
  </ul>
</div>

<div class="b-example-divider"></div>

<div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-5 align-items-center justify-content-center">
  <div class="dropdown-menu d-block position-static pt-0 mx-0 rounded-3 shadow overflow-hidden w-280px" data-bs-theme="light">
    <form class="p-2 mb-2 bg-body-tertiary border-bottom">
      <input type="search" class="form-control" autocomplete="false" placeholder="Type to filter...">
    </form>
    <ul class="list-unstyled mb-0">
      <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
        <span class="d-inline-block bg-success rounded-circle p-1"></span>
        Action
      </a></li>
      <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
        <span class="d-inline-block bg-primary rounded-circle p-1"></span>
        Another action
      </a></li>
      <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
        <span class="d-inline-block bg-danger rounded-circle p-1"></span>
        Something else here
      </a></li>
      <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
        <span class="d-inline-block bg-info rounded-circle p-1"></span>
        Separated link
      </a></li>
    </ul>
  </div>

  <div class="dropdown-menu d-block position-static border-0 pt-0 mx-0 rounded-3 shadow overflow-hidden w-280px" data-bs-theme="dark">
    <form class="p-2 mb-2 bg-dark border-bottom border-dark">
      <input type="search" class="form-control bg-dark" autocomplete="false" placeholder="Type to filter...">
    </form>
    <ul class="list-unstyled mb-0">
      <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
        <span class="d-inline-block bg-success rounded-circle p-1"></span>
        Action
      </a></li>
      <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
        <span class="d-inline-block bg-primary rounded-circle p-1"></span>
        Another action
      </a></li>
      <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
        <span class="d-inline-block bg-danger rounded-circle p-1"></span>
        Something else here
      </a></li>
      <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
        <span class="d-inline-block bg-info rounded-circle p-1"></span>
        Separated link
      </a></li>
    </ul>
  </div>
</div>

<div class="b-example-divider"></div>

<div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-5 align-items-center justify-content-center">
  <ul class="dropdown-menu d-block position-static mx-0 shadow w-220px" data-bs-theme="light">
    <li>
      <a class="dropdown-item d-flex gap-2 align-items-center" href="#">
        <svg class="bi" width="16" height="16"><use xlink:href="#files"/></svg>
        Documents
      </a>
    </li>
    <li>
      <a class="dropdown-item d-flex gap-2 align-items-center" href="#">
        <svg class="bi" width="16" height="16"><use xlink:href="#image-fill"/></svg>
        Photos
      </a>
    </li>
    <li>
      <a class="dropdown-item d-flex gap-2 align-items-center" href="#">
        <svg class="bi" width="16" height="16"><use xlink:href="#film"/></svg>
        Movies
      </a>
    </li>
    <li>
      <a class="dropdown-item d-flex gap-2 align-items-center" href="#">
        <svg class="bi" width="16" height="16"><use xlink:href="#music-note-beamed"/></svg>
        Music
      </a>
    </li>
    <li>
      <a class="dropdown-item d-flex gap-2 align-items-center" href="#">
        <svg class="bi" width="16" height="16"><use xlink:href="#joystick"/></svg>
        Games
      </a>
    </li>
    <li><hr class="dropdown-divider"></li>
    <li>
      <a class="dropdown-item dropdown-item-danger d-flex gap-2 align-items-center" href="#">
        <svg class="bi" width="16" height="16"><use xlink:href="#trash"/></svg>
        Trash
      </a>
    </li>
  </ul>
  <ul class="dropdown-menu d-block position-static mx-0 border-0 shadow w-220px" data-bs-theme="dark">
    <li>
      <a class="dropdown-item d-flex gap-2 align-items-center" href="#">
        <svg class="bi" width="16" height="16"><use xlink:href="#files"/></svg>
        Documents
      </a>
    </li>
    <li>
      <a class="dropdown-item d-flex gap-2 align-items-center" href="#">
        <svg class="bi" width="16" height="16"><use xlink:href="#image-fill"/></svg>
        Photos
      </a>
    </li>
    <li>
      <a class="dropdown-item d-flex gap-2 align-items-center" href="#">
        <svg class="bi" width="16" height="16"><use xlink:href="#film"/></svg>
        Movies
      </a>
    </li>
    <li>
      <a class="dropdown-item d-flex gap-2 align-items-center" href="#">
        <svg class="bi" width="16" height="16"><use xlink:href="#music-note-beamed"/></svg>
        Music
      </a>
    </li>
    <li>
      <a class="dropdown-item d-flex gap-2 align-items-center" href="#">
        <svg class="bi" width="16" height="16"><use xlink:href="#joystick"/></svg>
        Games
      </a>
    </li>
    <li><hr class="dropdown-divider"></li>
    <li>
      <a class="dropdown-item d-flex gap-2 align-items-center" href="#">
        <svg class="bi" width="16" height="16"><use xlink:href="#trash"/></svg>
        Trash
      </a>
    </li>
  </ul>
</div>

<div class="b-example-divider"></div>

<div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-5 align-items-center justify-content-center">
  <div class="dropdown-menu d-block position-static p-2 mx-0 shadow rounded-3 w-340px" data-bs-theme="light">
    <div class="d-grid gap-1">
      <div class="cal">
        <div class="cal-month">
          <button class="btn cal-btn" type="button">
            <svg class="bi" width="16" height="16"><use xlink:href="#arrow-left-short"/></svg>
          </button>
          <strong class="cal-month-name">June</strong>
          <select class="form-select cal-month-name d-none">
            <option value="January">January</option>
            <option value="February">February</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option selected value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
          </select>
          <button class="btn cal-btn" type="button">
            <svg class="bi" width="16" height="16"><use xlink:href="#arrow-right-short"/></svg>
          </button>
        </div>
        <div class="cal-weekdays text-body-secondary">
          <div class="cal-weekday">Sun</div>
          <div class="cal-weekday">Mon</div>
          <div class="cal-weekday">Tue</div>
          <div class="cal-weekday">Wed</div>
          <div class="cal-weekday">Thu</div>
          <div class="cal-weekday">Fri</div>
          <div class="cal-weekday">Sat</div>
        </div>
        <div class="cal-days">
          <button class="btn cal-btn" disabled type="button">30</button>
          <button class="btn cal-btn" disabled type="button">31</button>

          <button class="btn cal-btn" type="button">1</button>
          <button class="btn cal-btn" type="button">2</button>
          <button class="btn cal-btn" type="button">3</button>
          <button class="btn cal-btn" type="button">4</button>
          <button class="btn cal-btn" type="button">5</button>
          <button class="btn cal-btn" type="button">6</button>
          <button class="btn cal-btn" type="button">7</button>

          <button class="btn cal-btn" type="button">8</button>
          <button class="btn cal-btn" type="button">9</button>
          <button class="btn cal-btn" type="button">10</button>
          <button class="btn cal-btn" type="button">11</button>
          <button class="btn cal-btn" type="button">12</button>
          <button class="btn cal-btn" type="button">13</button>
          <button class="btn cal-btn" type="button">14</button>

          <button class="btn cal-btn" type="button">15</button>
          <button class="btn cal-btn" type="button">16</button>
          <button class="btn cal-btn" type="button">17</button>
          <button class="btn cal-btn" type="button">18</button>
          <button class="btn cal-btn" type="button">19</button>
          <button class="btn cal-btn" type="button">20</button>
          <button class="btn cal-btn" type="button">21</button>

          <button class="btn cal-btn" type="button">22</button>
          <button class="btn cal-btn" type="button">23</button>
          <button class="btn cal-btn" type="button">24</button>
          <button class="btn cal-btn" type="button">25</button>
          <button class="btn cal-btn" type="button">26</button>
          <button class="btn cal-btn" type="button">27</button>
          <button class="btn cal-btn" type="button">28</button>

          <button class="btn cal-btn" type="button">29</button>
          <button class="btn cal-btn" type="button">30</button>
          <button class="btn cal-btn" type="button">31</button>
        </div>
      </div>
    </div>
  </div>

  <div class="dropdown-menu d-block position-static p-2 mx-0 shadow rounded-3 w-340px" data-bs-theme="dark">
    <div class="d-grid gap-1">
      <div class="cal">
        <div class="cal-month">
          <button class="btn cal-btn" type="button">
            <svg class="bi" width="16" height="16"><use xlink:href="#arrow-left-short"/></svg>
          </button>
          <strong class="cal-month-name">June</strong>
          <select class="form-select cal-month-name d-none">
            <option value="January">January</option>
            <option value="February">February</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option selected value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
          </select>
          <button class="btn cal-btn" type="button">
            <svg class="bi" width="16" height="16"><use xlink:href="#arrow-right-short"/></svg>
          </button>
        </div>
        <div class="cal-weekdays text-body-secondary">
          <div class="cal-weekday">Sun</div>
          <div class="cal-weekday">Mon</div>
          <div class="cal-weekday">Tue</div>
          <div class="cal-weekday">Wed</div>
          <div class="cal-weekday">Thu</div>
          <div class="cal-weekday">Fri</div>
          <div class="cal-weekday">Sat</div>
        </div>
        <div class="cal-days">
          <button class="btn cal-btn" disabled type="button">30</button>
          <button class="btn cal-btn" disabled type="button">31</button>

          <button class="btn cal-btn" type="button">1</button>
          <button class="btn cal-btn" type="button">2</button>
          <button class="btn cal-btn" type="button">3</button>
          <button class="btn cal-btn" type="button">4</button>
          <button class="btn cal-btn" type="button">5</button>
          <button class="btn cal-btn" type="button">6</button>
          <button class="btn cal-btn" type="button">7</button>

          <button class="btn cal-btn" type="button">8</button>
          <button class="btn cal-btn" type="button">9</button>
          <button class="btn cal-btn" type="button">10</button>
          <button class="btn cal-btn" type="button">11</button>
          <button class="btn cal-btn" type="button">12</button>
          <button class="btn cal-btn" type="button">13</button>
          <button class="btn cal-btn" type="button">14</button>

          <button class="btn cal-btn" type="button">15</button>
          <button class="btn cal-btn" type="button">16</button>
          <button class="btn cal-btn" type="button">17</button>
          <button class="btn cal-btn" type="button">18</button>
          <button class="btn cal-btn" type="button">19</button>
          <button class="btn cal-btn" type="button">20</button>
          <button class="btn cal-btn" type="button">21</button>

          <button class="btn cal-btn" type="button">22</button>
          <button class="btn cal-btn" type="button">23</button>
          <button class="btn cal-btn" type="button">24</button>
          <button class="btn cal-btn" type="button">25</button>
          <button class="btn cal-btn" type="button">26</button>
          <button class="btn cal-btn" type="button">27</button>
          <button class="btn cal-btn" type="button">28</button>

          <button class="btn cal-btn" type="button">29</button>
          <button class="btn cal-btn" type="button">30</button>
          <button class="btn cal-btn" type="button">31</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="b-example-divider"></div>

<div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-5 align-items-center justify-content-center">
  <div class="dropdown-menu position-static d-flex flex-column flex-lg-row align-items-stretch justify-content-start p-3 rounded-3 shadow-lg" data-bs-theme="light">
    <nav class="col-lg-8">
      <ul class="list-unstyled d-flex flex-column gap-2">
        <li>
          <a href="#" class="btn btn-hover-light rounded-2 d-flex align-items-start gap-2 py-2 px-3 lh-sm text-start">
            <svg class="bi" width="24" height="24"><use xlink:href="#image-fill"/></svg>
            <div>
              <strong class="d-block">Main product</strong>
              <small>Take a tour through the product</small>
            </div>
          </a>
        </li>
        <li>
          <a href="#" class="btn btn-hover-light rounded-2 d-flex align-items-start gap-2 py-2 px-3 lh-sm text-start">
            <svg class="bi" width="24" height="24"><use xlink:href="#music-note-beamed"/></svg>
            <div>
              <strong class="d-block">Another product</strong>
              <small>Explore this other product we offer</small>
            </div>
          </a>
        </li>
        <li>
          <a href="#" class="btn btn-hover-light rounded-2 d-flex align-items-start gap-2 py-2 px-3 lh-sm text-start">
            <svg class="bi" width="24" height="24"><use xlink:href="#question-circle"/></svg>
            <div>
              <strong class="d-block">Support</strong>
              <small>Get help from our support crew</small>
            </div>
          </a>
        </li>
      </ul>
    </nav>
    <div class="d-none d-lg-block vr mx-4 opacity-10">&nbsp;</div>
    <hr class="d-lg-none">
    <div class="col-lg-auto pe-3">
      <nav>
        <ul class="d-flex flex-column gap-2 list-unstyled small">
          <li><a href="#" class="link-offset-2 link-underline link-underline-opacity-25 link-underline-opacity-75-hover">Documentation</a></li>
          <li><a href="#" class="link-offset-2 link-underline link-underline-opacity-25 link-underline-opacity-75-hover">Use cases</a></li>
          <li><a href="#" class="link-offset-2 link-underline link-underline-opacity-25 link-underline-opacity-75-hover">API status</a></li>
          <li><a href="#" class="link-offset-2 link-underline link-underline-opacity-25 link-underline-opacity-75-hover">Partners</a></li>
          <li><a href="#" class="link-offset-2 link-underline link-underline-opacity-25 link-underline-opacity-75-hover">Resources</a></li>
        </ul>
      </nav>
    </div>
  </div>

  <div class="dropdown-menu position-static d-flex flex-column flex-lg-row align-items-stretch justify-content-start p-3 rounded-3 shadow-lg" data-bs-theme="dark">
    <nav class="col-lg-8">
      <ul class="list-unstyled d-flex flex-column gap-2">
        <li>
          <a href="#" class="btn btn-hover-light rounded-2 d-flex align-items-start gap-2 py-2 px-3 lh-sm text-start">
            <svg class="bi" width="24" height="24"><use xlink:href="#image-fill"/></svg>
            <div>
              <strong class="d-block">Main product</strong>
              <small>Take a tour through the product</small>
            </div>
          </a>
        </li>
        <li>
          <a href="#" class="btn btn-hover-light rounded-2 d-flex align-items-start gap-2 py-2 px-3 lh-sm text-start">
            <svg class="bi" width="24" height="24"><use xlink:href="#music-note-beamed"/></svg>
            <div>
              <strong class="d-block">Another product</strong>
              <small>Explore this other product we offer</small>
            </div>
          </a>
        </li>
        <li>
          <a href="#" class="btn btn-hover-light rounded-2 d-flex align-items-start gap-2 py-2 px-3 lh-sm text-start">
            <svg class="bi" width="24" height="24"><use xlink:href="#question-circle"/></svg>
            <div>
              <strong class="d-block">Support</strong>
              <small>Get help from our support crew</small>
            </div>
          </a>
        </li>
      </ul>
    </nav>
    <div class="d-none d-lg-block vr mx-4 opacity-10">&nbsp;</div>
    <hr class="d-lg-none">
    <div class="col-lg-auto pe-3">
      <nav>
        <ul class="d-flex flex-column gap-2 list-unstyled small">
          <li><a href="#" class="link-offset-2 link-underline link-underline-opacity-25 link-underline-opacity-75-hover">Documentation</a></li>
          <li><a href="#" class="link-offset-2 link-underline link-underline-opacity-25 link-underline-opacity-75-hover">Use cases</a></li>
          <li><a href="#" class="link-offset-2 link-underline link-underline-opacity-25 link-underline-opacity-75-hover">API status</a></li>
          <li><a href="#" class="link-offset-2 link-underline link-underline-opacity-25 link-underline-opacity-75-hover">Partners</a></li>
          <li><a href="#" class="link-offset-2 link-underline link-underline-opacity-25 link-underline-opacity-75-hover">Resources</a></li>
        </ul>
      </nav>
    </div>
  </div>
</div>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
