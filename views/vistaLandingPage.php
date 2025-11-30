<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4Ever Young | Clínica Médica</title>
    <link rel="stylesheet" href="./views/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    <link rel="icon" type="image" href="./views/images/logo/logoSinLetras.png">
</head>
<body>

    <!-- BLOQUE: HEADER -->
    <header class="header">
        <div class="header__logo">
            <img src="./views/images/logo/logo.webp" alt="Logo 4Ever Young">
        </div>

        <!-- BLOQUE: NAV -->
        <input type="checkbox" id="menu-toggle" class="nav__toggle">
        <label for="menu-toggle" class="nav__hamburger">
            <span></span>
            <span></span>
            <span></span>
        </label>

        <nav class="nav">
            <form action="index.php" method="post">
                <button type="submit" class="nav__item nav__item--active" name="landingpage" >Inicio</button>
            </form>
            <button><a href="#servicios" class="nav__item">Servicios</a></button>
            <form action="index.php" method="post">
                <button type="submit" class="nav__item" name="citas" >Mis citas</button>
            </form>


            <!-- ELEMENTO: Grupo de Autenticación -->
            <div class="nav__auth-group">
                <form action="index.php" method="post">
                    <button type="submit" class="nav__item" name="usuario" >Panel de Usuario</button>
                </form>
            </div>

            <!-- BOTON PEDIR CITA -->
            <form action="index.php" method="post">
                <button type="submit" class="button" name="especialidades">
                    <div class="wrap">
                        <p>
                            <span>✧</span>
                            <span>✦</span>
                            Solicitar Cita
                        </p>
                    </div>
                </button>
            </form>

        </nav>
    </header>

    <!-- CONTENIDO PRINCIPAL -->
    <main>
        
        <!-- BLOQUE VIDEO-->
        <div class="video-background">
            <video id="background-video" autoplay muted loop playsinline poster="../views/images/video.webp">
                <source src="./views/images/videoMain.mp4" type="video/mp4">
                Tu navegador no soporta la etiqueta de video.
            </video>

            <div class="video-overlay"></div>

            <div class="content">
                <h1>El Destello de tu Próxima Salud.</h1>
                <p class="subtitle">Atención integral y personalizada para toda la familia, la clave para tu bienestar duradero.</p>

                <div class="cta-buttons">
                    <a href="#filosofia" class="btn btn-primary-hero">Descubre Nuestra Filosofía 4EY</a>
                    <a href="#servicios" class="btn btn-secondary-hero">Ver Todos los Servicios</a>
                </div>
            </div>
        </div>

        <!-- BLOQUE: SERVICIOS -->
        <section id="servicios" class="services">
            <h2 class="services__title">Especialidades Médicas</h2>
            <div class="services__card-grid">
                <div class="card"><p class="card-title">Ginecología</p><p class="small-desc">Salud integral de la mujer.</p><div class="go-corner"><div class="go-star">✦</div></div></div>
                <div class="card"><p class="card-title">Traumatología</p><p class="small-desc">Tratamiento de lesiones óseas y musculares.</p><div class="go-corner"><div class="go-star">✦</div></div></div>
                <div class="card"><p class="card-title">Odontología</p><p class="small-desc">Cuidado avanzado de la salud bucal.</p><div class="go-corner"><div class="go-star">✦</div></div></div>
                <div class="card"><p class="card-title">Neurología</p><p class="small-desc">Diagnóstico de trastornos neurológicos.</p><div class="go-corner"><div class="go-star">✦</div></div></div>
                <div class="card"><p class="card-title">Oncología</p><p class="small-desc">Atención especializada contra el cáncer.</p><div class="go-corner"><div class="go-star">✦</div></div></div>
                <div class="card"><p class="card-title">Urología</p><p class="small-desc">Salud del sistema urinario.</p><div class="go-corner"><div class="go-star">✦</div></div></div>
                <div class="card"><p class="card-title">Pediatría</p><p class="small-desc">Atención para niños y jóvenes.</p><div class="go-corner"><div class="go-star">✦</div></div></div>
                <div class="card"><p class="card-title">Cardiología</p><p class="small-desc">Cuidado para el corazón y circulación.</p><div class="go-corner"><div class="go-star">✦</div></div></div>
                <div class="card"><p class="card-title">Dermatología</p><p class="small-desc">Salud de la piel, cabello y uñas.</p><div class="go-corner"><div class="go-star">✦</div></div></div>
                <div class="card"><p class="card-title">Endocrinología</p><p class="small-desc">Especialistas en glándulas y hormonas.</p><div class="go-corner"><div class="go-star">✦</div></div></div>
                <div class="card"><p class="card-title">Oftalmología</p><p class="small-desc">Diagnóstico y cuidado visual.</p><div class="go-corner"><div class="go-star">✦</div></div></div>
                <div class="card"><p class="card-title">Cirugía General</p><p class="small-desc">Procedimientos quirúrgicos esenciales.</p><div class="go-corner"><div class="go-star">✦</div></div></div>
            </div>
        </section>

         <!-- BLOQUE: GALERIA -->
          <section class="seccion" id="galeria">
            <h2 class="seccion-titulo">Profesionales Dedicados a tu Salud</h2>
            <div class="gal">
                <img src="./views/images/gallery/1.avif" alt="1">
                <img src="./views/images/gallery/2.avif" alt="2">
                <img src="./views/images/gallery/3.avif" alt="3">
                <img src="./views/images/gallery/4.avif" alt="4">
            </div>
        </section>

        <!-- BLOQUE: FILOSOFIA -->
        <section id="filosofia" class="philosophy">
            <div class="philosophy__container">
                <h2 class="philosophy__title">Nuestra Filosofía y Compromiso 4EY</h2>
                
                <div class="philosophy__content">
                    <div class="philosophy__card philosophy__card--vision">
                        <h3>Visión: Bienestar Integral</h3>
                        <p>Ser la clínica de referencia en medicina preventiva y estética, fusionando tecnología avanzada con un enfoque humano y personalizado. Creemos que la salud duradera se basa en el equilibrio físico, mental y emocional.</p>
                    </div>
                    
                    <div class="philosophy__card philosophy__card--mission">
                        <h3>Misión: Cuidado Personalizado</h3>
                        <p>Proporcionar atención médica de la más alta calidad, con programas diseñados a medida que no solo tratan síntomas, sino que optimizan la vitalidad y el bienestar de cada paciente a largo plazo. Tu salud es nuestra prioridad.</p>
                    </div>
                </div>

                <div class="policy-links">
                    <h4>Conoce la base de nuestro cuidado:</h4>
                    <a href="#calidad" class="btn btn-policy">Política de Calidad</a>
                    <a href="#privacidad" class="btn btn-policy">Política de Privacidad</a>
                    <a href="#etica" class="btn btn-policy">Código de Ética Médica</a>
                </div>
            </div>
        </section>

        <!-- BLOQUE: SECCION FINAL -->
        <section id="contacto" class="cta-section">
            <div class="cta-icon">
                <span><img src="./views/images/logo/logoSinLetras.png" alt=""></span>
            </div>
            <h2 class="cta-section__title">Da el Primer Paso hacia tu Bienestar.</h2>
            <p class="cta-section__subtitle">
                ¿Tienes dudas sobre una especialidad? Contacta con nuestro equipo para una consulta informativa gratuita.
            </p>
            <a href="mailto:clinica4everyoung@gmail.com" class="btn btn--secondary btn--large">Hablemos Ahora</a>        
        </section>

    </main>

    <!-- BLOQUE: FOOTER -->
    <footer class="footer">
        <p class="footer__text">&copy; 2025 4Ever Young. Todos los derechos reservados.</p>
    </footer>

</body>
</html>