<?php
/*
Template Name: Бренд

Template Post Type: post, page, product 
*/
get_header(); ?>


	
		  <!-- main content starts-->
    <main class="main" id="main">
      <section class="section-meta">
        <div class="container section-meta__container">

            <!-- breadcrumbs start-->
            <div class="storefront-breadcrumb"><div class="col-full"><nav class="woocommerce-breadcrumb"><span class="breadcrumb-title"></span>

                        <a class="breadcrumbs__link" href="<?php echo get_home_url(); ?>">Интернет магазин туристического снаряжения KELT</a>
                        <span class="delimiter">/</span><span class="breadcrumb-title"></span><?php the_title() ?></nav></div></div>
            <!-- breadcrumbs end-->

          <h1 class="section-meta__title caption">Бренды</h1>
        </div>
      </section>
      <section class="section-brands">
        <div class="container section-brands__container">
          <div class="section-brands__featured">
            <section class="section-brand-card">
        <div class="container section-brand-card__container">
          <div class="section-brand-card__left">
            <h2 class="section-brand-card__header">категории бренда <?php the_title(); ?></h2>
            <ul class="aside-menu aside-menu_decorated section-brand-card__aside-menu">
              <li class="aside-menu__item"><a href="#">Питьевые системы</a></li>
            </ul>
            
            <a class="button section-brand-card__all" href="#"><span>все товары</span></a>
          </div>
          <div class="section-brand-card__right">
            <article class="article text text_light section-brand-card__article clearfix">
			<h2 class="hidden"><?php the_title(); ?></h2>
			<?php while( have_posts() ) : the_post();
                        $more = 1; // отображаем полностью всё содержимое поста
                        
                        the_content(); // выводим контент
                    endwhile; ?>
        </article>
          </div>
        </div>
      </section>
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
      <section>			  
			            <div class="section-category__content">
            <div class="user-tools section-category__user-tools">
              <div class="switch section-category__switch">
                <p class="switch__label">Вид</p>
                <ul class="switch__states">
                  <li class="switch__state switch__state_lines"></li>
                  <li class="switch__state switch__state_tiles switch__state_active"></li>
                </ul>
              </div>
              <div class="amounter section-category__amounter">
                <p class="amounter__label">Показывать на странице</p>
                <div class="select-wrapper amounter__select-wrapper">
                  <select class="select">
                    <option>12</option>
                    <option>24</option>
                    <option>36</option>
                    <option>48</option>
                  </select>
                </div>
              </div>
              <div class="section-category__sorter">
                <div class="select-wrapper">
                  <select class="select">
                    <option disabled selected>Сортировать по</option>
                    <option>По названию товара, от А до Я</option>
                    <option>По названию товара, от Я до А</option>
                    <option>Акции</option>
                    <option>Новинки</option>
                    <option>По рейтингу</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="section-category__products">
              <div class="product product_not-available section-category__product product_view_tile">
                <div class="price product__price"><span class="price__digits">90 640</span><span class="price__unit">грн.</span></div>
                <div class="product__body">
                  
                  <a class="product__image-box" href="card.html">
                    
                    <img src="images/tents/t-01.jpg" alt="tent"/></a>
                  <div class="product__info-box">
                    
                    <a class="product__name" href="card.html">Палатка - шатер TRAMP MOSQUITO</a>
                    <p class="product__traits">Артикул: TRT-085<br>Производитель: Tramp<br>Назначение: кемпинг </p>
                    <p class="product__description">Палатка-шатер с двумя входами. Оснащена защитной «юбкой» и москитной сеткой. Палатка устойчив к ультрафиолетовому излучению и имеет пропитку, задерживающую распространение огня. Все швы данной модели надежно ....</p>
                    <p class="product__not-available">нет в наличии</p>
                  </div>
                </div>
              </div>
              <div class="product section-category__product product_view_tile">
                <div class="price product__price"><span class="price__digits">90 640</span><span class="price__unit">грн.</span></div>
                <div class="product__body">
                  
                  <a class="product__image-box" href="card.html">
                    
                    <img src="images/tents/t-02.jpg" alt="tent"/></a>
                  <div class="product__info-box">
                    
                    <a class="product__name" href="card.html">Палатка - шатер TRAMP MOSQUITO</a>
                    <p class="product__traits">Артикул: TRT-085<br>Производитель: Tramp<br>Назначение: кемпинг </p>
                    <p class="product__description">Палатка-шатер с двумя входами. Оснащена защитной «юбкой» и москитной сеткой. Палатка устойчив к ультрафиолетовому излучению и имеет пропитку, задерживающую распространение огня. Все швы данной модели надежно ....</p>
                    
                    <a class="product__to-cart button button_green" href="#"><span>купить</span></a>
                  </div>
                </div>
              </div>
              <div class="product section-category__product product_view_tile">
                <div class="price product__price"><span class="price__digits">90 640</span><span class="price__unit">грн.</span></div>
                <div class="product__body">
                  
                  <a class="product__image-box" href="card.html">
                    
                    <img src="images/tents/t-03.jpg" alt="tent"/></a>
                  <div class="product__info-box">
                    
                    <a class="product__name" href="card.html">Палатка - шатер TRAMP MOSQUITO</a>
                    <p class="product__traits">Артикул: TRT-085<br>Производитель: Tramp<br>Назначение: кемпинг </p>
                    <p class="product__description">Палатка-шатер с двумя входами. Оснащена защитной «юбкой» и москитной сеткой. Палатка устойчив к ультрафиолетовому излучению и имеет пропитку, задерживающую распространение огня. Все швы данной модели надежно ....</p>
                    
                    <a class="product__to-cart button button_green" href="#"><span>купить</span></a>
                  </div>
                </div>
              </div>
              <div class="product section-category__product product_view_tile">
                <div class="price product__price"><span class="price__digits">90 640</span><span class="price__unit">грн.</span></div>
                <div class="product__body">
                  
                  <a class="product__image-box" href="card.html">
                    
                    <img src="images/tents/t-01.jpg" alt="tent"/></a>
                  <div class="product__info-box">
                    
                    <a class="product__name" href="card.html">Палатка - шатер TRAMP MOSQUITO</a>
                    <p class="product__traits">Артикул: TRT-085<br>Производитель: Tramp<br>Назначение: кемпинг </p>
                    <p class="product__description">Палатка-шатер с двумя входами. Оснащена защитной «юбкой» и москитной сеткой. Палатка устойчив к ультрафиолетовому излучению и имеет пропитку, задерживающую распространение огня. Все швы данной модели надежно ....</p>
                    
                    <a class="product__to-cart button button_green" href="#"><span>купить</span></a>
                  </div>
                </div>
              </div>
              <div class="product section-category__product product_view_tile">
                <div class="price product__price"><span class="price__digits">90 640</span><span class="price__unit">грн.</span></div>
                <div class="product__body">
                  
                  <a class="product__image-box" href="card.html">
                    
                    <img src="images/tents/t-02.jpg" alt="tent"/></a>
                  <div class="product__info-box">
                    
                    <a class="product__name" href="card.html">Палатка - шатер TRAMP MOSQUITO</a>
                    <p class="product__traits">Артикул: TRT-085<br>Производитель: Tramp<br>Назначение: кемпинг </p>
                    <p class="product__description">Палатка-шатер с двумя входами. Оснащена защитной «юбкой» и москитной сеткой. Палатка устойчив к ультрафиолетовому излучению и имеет пропитку, задерживающую распространение огня. Все швы данной модели надежно ....</p>
                    
                    <a class="product__to-cart button button_green" href="#"><span>купить</span></a>
                  </div>
                </div>
              </div>
              <div class="product section-category__product product_view_tile">
                <div class="price product__price"><span class="price__digits">90 640</span><span class="price__unit">грн.</span></div>
                <div class="product__body">
                  
                  <a class="product__image-box" href="card.html">
                    
                    <img src="images/tents/t-03.jpg" alt="tent"/></a>
                  <div class="product__info-box">
                    
                    <a class="product__name" href="card.html">Палатка - шатер TRAMP MOSQUITO</a>
                    <p class="product__traits">Артикул: TRT-085<br>Производитель: Tramp<br>Назначение: кемпинг </p>
                    <p class="product__description">Палатка-шатер с двумя входами. Оснащена защитной «юбкой» и москитной сеткой. Палатка устойчив к ультрафиолетовому излучению и имеет пропитку, задерживающую распространение огня. Все швы данной модели надежно ....</p>
                    
                    <a class="product__to-cart button button_green" href="#"><span>купить</span></a>
                  </div>
                </div>
              </div>
              <div class="product section-category__product product_view_tile">
                <div class="price product__price"><span class="price__digits">90 640</span><span class="price__unit">грн.</span></div>
                <div class="product__body">
                  
                  <a class="product__image-box" href="card.html">
                    
                    <img src="images/tents/t-01.jpg" alt="tent"/></a>
                  <div class="product__info-box">
                    
                    <a class="product__name" href="card.html">Палатка - шатер TRAMP MOSQUITO</a>
                    <p class="product__traits">Артикул: TRT-085<br>Производитель: Tramp<br>Назначение: кемпинг </p>
                    <p class="product__description">Палатка-шатер с двумя входами. Оснащена защитной «юбкой» и москитной сеткой. Палатка устойчив к ультрафиолетовому излучению и имеет пропитку, задерживающую распространение огня. Все швы данной модели надежно ....</p>
                    
                    <a class="product__to-cart button button_green" href="#"><span>купить</span></a>
                  </div>
                </div>
              </div>
              <div class="product section-category__product product_view_tile">
                <div class="price product__price"><span class="price__digits">90 640</span><span class="price__unit">грн.</span></div>
                <div class="product__body">
                  
                  <a class="product__image-box" href="card.html">
                    
                    <img src="images/tents/t-02.jpg" alt="tent"/></a>
                  <div class="product__info-box">
                    
                    <a class="product__name" href="card.html">Палатка - шатер TRAMP MOSQUITO</a>
                    <p class="product__traits">Артикул: TRT-085<br>Производитель: Tramp<br>Назначение: кемпинг </p>
                    <p class="product__description">Палатка-шатер с двумя входами. Оснащена защитной «юбкой» и москитной сеткой. Палатка устойчив к ультрафиолетовому излучению и имеет пропитку, задерживающую распространение огня. Все швы данной модели надежно ....</p>
                    
                    <a class="product__to-cart button button_green" href="#"><span>купить</span></a>
                  </div>
                </div>
              </div>
              <div class="product section-category__product product_view_tile">
                <div class="price product__price"><span class="price__digits">90 640</span><span class="price__unit">грн.</span></div>
                <div class="product__body">
                  
                  <a class="product__image-box" href="card.html">
                    
                    <img src="images/tents/t-03.jpg" alt="tent"/></a>
                  <div class="product__info-box">
                    
                    <a class="product__name" href="card.html">Палатка - шатер TRAMP MOSQUITO</a>
                    <p class="product__traits">Артикул: TRT-085<br>Производитель: Tramp<br>Назначение: кемпинг </p>
                    <p class="product__description">Палатка-шатер с двумя входами. Оснащена защитной «юбкой» и москитной сеткой. Палатка устойчив к ультрафиолетовому излучению и имеет пропитку, задерживающую распространение огня. Все швы данной модели надежно ....</p>
                    
                    <a class="product__to-cart button button_green" href="#"><span>купить</span></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="section-category__pager">
              <p class="section-category__page-info">Показано 9 товаров из 90</p>
              <ul class="pagination section-category__pagination">
                <li class="pagination__item pagination__item_active">1</li>
                <li class="pagination__item"><a href="#">2</a></li>
                <li class="pagination__item pagination__item_dots">...</li>
                <li class="pagination__item"><a href="#">11</a></li>
                <li class="pagination__item"><a href="#">12</a></li>
              </ul>
            </div>
            <div class="section-category__advantages">
              <h3 class="caption caption_center caption_margin">почему мы</h3>
              <div class="section-category__advantages-box">
                <div class="advantage section-category__advantage">
                  <div class="advantage__icon advantage__icon_original"></div>
                  <p class="advantage__info">Только оригинальная<br>продукция</p>
                </div>
                <div class="advantage section-category__advantage">
                  <div class="advantage__icon advantage__icon_delivery"></div>
                  <p class="advantage__info">Оперативная<br>доставка</p>
                </div>
                <div class="advantage section-category__advantage">
                  <div class="advantage__icon advantage__icon_discount"></div>
                  <p class="advantage__info">Скидки постоянным<br>клиентам</p>
                </div>
                <div class="advantage section-category__advantage">
                  <div class="advantage__icon advantage__icon_payment"></div>
                  <p class="advantage__info">Оплата удобным<br>для вас способом</p>
                </div>
                <div class="advantage section-category__advantage">
                  <div class="advantage__icon advantage__icon_return"></div>
                  <p class="advantage__info">14 дней на обмен<br>или возврат</p>
                </div>
                <div class="advantage section-category__advantage">
                  <div class="advantage__icon advantage__icon_consult"></div>
                  <p class="advantage__info">Профессиональная<br>консультация</p>
                </div>
              </div>
            </div>
          </div>
      </section>
 
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
      <section class="section-recent margin-bottom-60">
        <div class="container section-recent__container">
          <h2 class="caption caption_black caption_margin caption_center caption_mobile">Товары0 бренда</h2>
          <div class="section-recent__slider-wrapper">
            <div class="slider slider_recent section-recent__slider owl-carousel owl-carousel_recent owl-theme">
              
              <a class="mini-card section-recent__mini-card" href="card.html">
                <div class="price mini-card__price"><span class="price__digits">4 200</span><span class="price__unit">грн.</span></div>
                <div class="mini-card__image-box">
                  
                  <img src="images/recent/r-1.jpg" alt="recent ware"/>
                </div>
                <p class="mini-card__name">Компрессионные лосины 2XU Base Leggings W</p></a>
              
              <a class="mini-card section-recent__mini-card" href="card.html">
                <div class="price mini-card__price"><span class="price__digits">964</span><span class="price__unit">грн.</span></div>
                <div class="mini-card__image-box">
                  
                  <img src="images/recent/r-2.jpg" alt="recent ware"/>
                </div>
                <p class="mini-card__name">Сандалии FEEL FREE KIRI</p></a>
              
              <a class="mini-card section-recent__mini-card" href="card.html">
                <div class="price mini-card__price"><span class="price__digits">960</span><span class="price__unit">грн.</span></div>
                <div class="mini-card__image-box">
                  
                  <img src="images/recent/r-3.jpg" alt="recent ware"/>
                </div>
                <p class="mini-card__name">Горнолыжные носки X-Socks Ski Alpine Silver</p></a>
              
              <a class="mini-card section-recent__mini-card" href="card.html">
                <div class="price price_old mini-card__price"><span class="price__digits">5 452</span><span class="price__unit">грн.</span></div>
                <div class="price price_new mini-card__price"><span class="price__digits">45 000</span><span class="price__unit">грн.</span></div>
                <div class="mini-card__image-box">
                  
                  <img src="images/recent/r-4.jpg" alt="recent ware"/>
                </div>
                <p class="mini-card__name">Кроссовки SALEWA UN TREKTAIL GTX 63455 0356</p></a>
              
              <a class="mini-card section-recent__mini-card" href="card.html">
                <div class="price mini-card__price"><span class="price__digits">4 200</span><span class="price__unit">грн.</span></div>
                <div class="mini-card__image-box">
                  
                  <img src="images/recent/r-1.jpg" alt="recent ware"/>
                </div>
                <p class="mini-card__name">Компрессионные лосины 2XU Base Leggings W</p></a>
              
              <a class="mini-card section-recent__mini-card" href="card.html">
                <div class="price mini-card__price"><span class="price__digits">964</span><span class="price__unit">грн.</span></div>
                <div class="mini-card__image-box">
                  
                  <img src="images/recent/r-2.jpg" alt="recent ware"/>
                </div>
                <p class="mini-card__name">Сандалии FEEL FREE KIRI</p></a>
              
              <a class="mini-card section-recent__mini-card" href="card.html">
                <div class="price mini-card__price"><span class="price__digits">960</span><span class="price__unit">грн.</span></div>
                <div class="mini-card__image-box">
                  
                  <img src="images/recent/r-3.jpg" alt="recent ware"/>
                </div>
                <p class="mini-card__name">Горнолыжные носки X-Socks Ski Alpine Silver</p></a>
              
              <a class="mini-card section-recent__mini-card" href="card.html">
                <div class="price price_old mini-card__price"><span class="price__digits">5 452</span><span class="price__unit">грн.</span></div>
                <div class="price price_new mini-card__price"><span class="price__digits">45 000</span><span class="price__unit">грн.</span></div>
                <div class="mini-card__image-box">
                  
                  <img src="images/recent/r-4.jpg" alt="recent ware"/>
                </div>
                <p class="mini-card__name">Кроссовки SALEWA UN TREKTAIL GTX 63455 0356</p></a>
            </div>
          </div>
        </div>
      </section>
    </main>
    <!-- main content ends-->

<?php get_footer(); ?>
