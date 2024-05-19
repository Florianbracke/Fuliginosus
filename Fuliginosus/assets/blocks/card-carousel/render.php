<?php 

    $achtergrond_kleur = get_field('achtergrond');
    $tekstkleur = get_field('tekstkleur');
    $titelkleur = get_field('titelkleur');
    
    $swipen_per_aantal = 3;

    $count = 0;

    $optie = get_field('opties');

    if($optie != 'aangepast'){

     
        $args = array(
            'numberposts' => 10,
            'post_type'   => $optie
        );

        $cards = get_posts( $args );

    } else {

        $cards = get_field('cards');

    }
?>


<div <?php echo get_block_wrapper_attributes([ 'class' => 'card-carousel' ]); ?> >

    <div class="wp-block-flavus-card-carousel">

        <div class=" wp-block-flavus-card-carousel-wrapper" style='grid-template-columns:<?php for ($x = 1; $x <= $swipen_per_aantal; $x++) {echo '1fr ';} ?>'>


            <?php foreach ($cards as $key => $card) : 

                $count++;

                if($optie != 'aangepast'){

                    $tekst = get_the_excerpt( $card->ID );
                    $titel = get_the_title( $card->ID );
                    $afbeelding = get_post_thumbnail_id( $card->ID );
                    $knop_URL = get_the_permalink( $card->ID );
            
                } else {

                    $tekst = $card['tekst'];
                    $titel = $card['titel'];
                    $afbeelding = $card['afbeelding'];
                    $knop_URL = $card['knop_url'];

                }
            ?>

                <div class="wp-block-flavus-card-carousel-card <?php if($achtergrond_kleur != 'geen'){ echo 'has-background'; } ?>" style='background-color:var(--<?php echo $achtergrond_kleur;?>)'>

                    <figure class='wp-block-image card-figure'  >
                        <img src=" <?php echo wp_get_attachment_image_url($afbeelding, 'large'); ?>" alt=" card-image-<?php echo $afbeelding; ?>" <?php if(is_admin()){ ?>style='width: 100%; aspect-ratio: 3/2; height: auto;object-fit: cover;' <?php } ?> > 
                    </figure>

                    <span class="text-info">

                        <h3 style='color:var(--<?php echo $titelkleur; ?>);' class="wp-block-heading card-heading <?php if($tekstkleur != 'geen'){ echo 'has-text-color';} ?>">
                            <?php echo $titel; ?>
                        </h3>

                        <p class="card-p" style='color:var(--<?php echo $tekstkleur; ?>); <?php if($tekstkleur != 'geen'){ echo 'has-text-color';} ?>'>
                            <?php echo $tekst; ?>
                        </p>

                        <?php if($knop_URL) : ?>
                            <div class="wp-block-buttons card-buttons">
                                <div class="wp-block-button">
                                    <a href="<?php echo $knop_URL; ?>" class="wp-block-button__link">
                                        <?php _e('Meer info','Flavus'); ?>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>

                    </span>
                   
                </div>

            <?php endforeach; ?>

        </div>

        <?php $slides_aantal = ceil($count / $swipen_per_aantal - 1); ?>

        <span class="wp-block-flavus-card-carousel-navigation">
            <div class="wp-block-flavus-card-carousel-pagination">  
                <?php for ($x = 0; $x <= $slides_aantal; $x++) : ?>
                    <span class=" circle <?php if($x == 0): ?> active <?php endif;?>">
                    
                    </span>
                <?php endfor; ?>
            </div>
        
            <span class="wp-block-flavus-card-carousel-buttons">
                <div class="wp-block-flavus-card-carousel-prev"></div>
                <div class="wp-block-flavus-card-carousel-next"></div>
            </span>

        </span>
  

    </div>

</div>

<script>


document.addEventListener('DOMContentLoaded', function () {
    const cardCarousel = document.querySelector('.wp-block-flavus-card-carousel');
    const cardWrapper = cardCarousel.querySelector('.wp-block-flavus-card-carousel-wrapper');
    const cards = cardWrapper.querySelectorAll('.wp-block-flavus-card-carousel-card');
    const pagination = cardCarousel.querySelector('.wp-block-flavus-card-carousel-pagination');
    const prevButton = cardCarousel.querySelector('.wp-block-flavus-card-carousel-prev');
    const nextButton = cardCarousel.querySelector('.wp-block-flavus-card-carousel-next');
    const textInfo = cardCarousel.querySelector('.wp-block-flavus-card-carousel-wrapper .text-info');

    const swipenPerAantal = <?php echo json_encode($swipen_per_aantal); ?>;

    let currentSlide = 0;

    function showSlides(direction) {
        const startIndex = currentSlide * swipenPerAantal;
        const endIndex = startIndex + swipenPerAantal;
        cards.forEach((card, index) => {
            if (index >= startIndex && index < endIndex) {
                if(direction == 'prev'){
                    card.classList.add('swipe-effect-prev'); 
                } if(direction == 'next') {
                    card.classList.add('swipe-effect-next');                    
                }
                card.style.display = 'block';
            } else { 
                card.classList.remove('swipe-effect-prev'); 
                card.classList.remove('swipe-effect-next'); 
                card.style.display = 'none';
            }
        });
        updatePagination();
    }

    function updatePagination() {
        pagination.querySelectorAll('.circle').forEach((circle, index) => {
            if (index === currentSlide) {
                circle.classList.add('active');
            } else {
                circle.classList.remove('active');
            }
        });
    }

    function prevSlide() {
        if (currentSlide > 0) {
            currentSlide--;
            showSlides('prev');
        }
    }

    function nextSlide() {
        const maxSlides = Math.ceil(cards.length / swipenPerAantal);
        if (currentSlide < maxSlides - 1) {
            currentSlide++;
            showSlides('next');
        }
    }

    prevButton.addEventListener('click', prevSlide);
    nextButton.addEventListener('click', nextSlide);

    pagination.addEventListener('click', function(event) {
        if (event.target.classList.contains('circle')) {
            const index = Array.from(this.children).indexOf(event.target);
            currentSlide = index;
            showSlides();
        }
    });

    // THIS WAS EXPERIMENT TO SWIPE LEFT ON CLICK LEFT SIDE OF DIV, RIGHT ON CLICK RIGHT SIDE DIV
    // cardWrapper.addEventListener('mousemove', function(event) {
    //     var boundingBox = this.getBoundingClientRect();
    //     var mouseX = event.clientX - boundingBox.left;

    //     // Calculate the center of the div
    //     var centerX = boundingBox.width / 2;

    //     // Change cursor based on mouse position
    //     if (mouseX < centerX) {
    //         cardWrapper.style.cursor = 'url("wp-content/themes/Flavus/assets/blocks/card-carousel/icons8-arrow-50-left-circle.png"), auto';
    //     } else {
    //         console.log('succes en vooruitgang');
    //         cardWrapper.style.cursor = 'url("wp-content/themes/Flavus/assets/blocks/card-carousel/icons8-arrow-50-right-circle.png"), auto';
    //     }
    // });

    // Array.from(textInfo).forEach(element => {
    //     element.addEventListener('mouseover', function() {
    //         textInfo.style.cursor = 'auto';
    //     });
    // });
   
    // cardWrapper.addEventListener('mouseleave', function() {
    //     cardWrapper.style.cursor = 'auto';
    // });

    // cardWrapper.addEventListener('click', function(event) {
    //     var boundingBox = this.getBoundingClientRect();
    //     var clickX = event.clientX - boundingBox.left;
    //     var centerX = boundingBox.width / 2;
    //     if (clickX < centerX) {
    //         prevSlide();
    //     } else {
    //         nextSlide();
    //     }
    // });

    showSlides();

    // Swipe functionality
    let startX = 0;
    let endX = 0;

    cardWrapper.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
    });

    cardWrapper.addEventListener('touchmove', (e) => {
        endX = e.touches[0].clientX;
    });

    cardWrapper.addEventListener('touchend', () => {
        const deltaX = startX - endX;
        if (deltaX > 50) {
            nextSlide('next');
        } else if (deltaX < -50) {
            prevSlide('prev');
        }
    });

    // Mouse drag functionality
    let isMouseDown = false;
    let dragStartX = 0;

    cardWrapper.addEventListener('mousedown', (e) => {
        isMouseDown = true;
        dragStartX = e.clientX;
    });

    cardWrapper.addEventListener('mouseup', () => {
        isMouseDown = false;
    });

    cardWrapper.addEventListener('mousemove', (e) => {
        if (!isMouseDown) return;
        const deltaX = dragStartX - e.clientX;
        if (deltaX > 50) {
            nextSlide();
            isMouseDown = false;
        } else if (deltaX < -50) {
            prevSlide();
            isMouseDown = false;
        }
    });

    cardWrapper.addEventListener('mouseleave', () => {
        isMouseDown = false;
    });
});


</script>