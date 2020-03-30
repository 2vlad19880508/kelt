<?php
/*
Template Name: Категория

Template Post Type: post, page, product 
*/
get_header(); ?>


	  <!-- main header ends-->

    <!-- main content starts-->
    <main class="main" id="main">
      <section class="section-meta">
        <div class="container section-meta__container">
          <!-- breadcrumbs start-->
          <ul class="breadcrumbs section-meta__breadcrumbs" id="breadcrumbs">
            <li class="breadcrumbs__item">
              
              <a class="breadcrumbs__link" href="index.html"><?php lang('Интернет магазин туристического снаряжения KELT', 'Інтернет магазин туристичного спорядження KELT') ?></a>
            </li>
            <li class="breadcrumbs__item">
              
              <a class="breadcrumbs__link" href="#">Туризм</a>
            </li>
            <li class="breadcrumbs__item breadcrumbs__item_last">Палатки</li>
          </ul>
          <!-- breadcrumbs end-->

          <h1 class="section-meta__title caption">палатки</h1>
        </div>
      </section>
      <section class="section-category">
        <div class="container section-category__container">
          <div class="section-category__aside">
            <div class="section-category__nav">
              <div class="section-category__menu">
                <h2 class="section-category__header">категории</h2>
                <ul class="aside-menu aside-menu_decorated section-category__aside-menu">
                  <li class="aside-menu__item"><a href="#">Одноместная</a></li>
                  <li class="aside-menu__item"><a href="#">Двухместная</a></li>
                  <li class="aside-menu__item"><a href="#">Трехместная</a></li>
                  <li class="aside-menu__item"><a href="#">Четырехместная</a></li>
                  <li class="aside-menu__item"><a href="#">Шатры</a></li>
                </ul>
              </div>
              <div class="section-category__filters">
                <h2 class="section-category__header">Фильтр</h2>
                <div class="slide-box section-category__filter">
                  <div class="slide-box__header">
                    <p class="caption">Бренды</p>
                    <div class="slide-box__toggle toggle">
                      <div class="toggle__line"></div>
                      <div class="toggle__line"></div>
                    </div>
                  </div>
                  <div class="slide-box__content">
                    <div class="section-category__filter-options">
                      <input class="checkbox" type="checkbox" name="opt-1" id="opt-1" checked>
                      <label class="checkbox-label" for="opt-1">Very long option for two line</label>
                      <input class="checkbox" type="checkbox" name="opt-2" id="opt-2">
                      <label class="checkbox-label" for="opt-2">Option 2</label>
                      <input class="checkbox" type="checkbox" name="opt-3" id="opt-3">
                      <label class="checkbox-label" for="opt-3">Option 3</label>
                      <input class="checkbox" type="checkbox" name="opt-4" id="opt-4" checked>
                      <label class="checkbox-label" for="opt-4">Option 4</label>
                    </div>
                  </div>
                </div>
                <div class="slide-box section-category__filter">
                  <div class="slide-box__header">
                    <p class="caption">Click ME! my sweety user!</p>
                    <div class="slide-box__toggle toggle">
                      <div class="toggle__line"></div>
                      <div class="toggle__line"></div>
                    </div>
                  </div>
                  <div class="slide-box__content">
                    <div class="section-category__filter-options">
                      <input class="checkbox" type="checkbox" name="opt-1" id="opt-1">
                      <label class="checkbox-label" for="opt-1">Very long option for two line</label>
                      <input class="checkbox" type="checkbox" name="opt-2" id="opt-2" checked>
                      <label class="checkbox-label" for="opt-2">Some text 2</label>
                      <input class="checkbox" type="checkbox" name="opt-3" id="opt-3" checked>
                      <label class="checkbox-label" for="opt-3">Some text 3</label>
                      <input class="checkbox" type="checkbox" name="opt-4" id="opt-4">
                      <label class="checkbox-label" for="opt-4">Some text 4</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="aside-recent section-category__recent">
              <p class="aside-recent__header">последние поступления</p>
              <div class="aside-recent__cards">
                
                <a class="mini-card aside-recent__mini-card" href="#">
                  <div class="price mini-card__price"><span class="price__digits">4 200</span><span class="price__unit">грн.</span></div>
                  <div class="mini-card__image-box">
                    
                    <img src="images/tents/t-03.jpg" alt="tent"/>
                  </div>
                  <p class="mini-card__name">Палатка 2-местная SOL FISHER Палатка 2-местная SOL FISHER Палатка 2-местная SOL FISHER</p></a>
                
                <a class="mini-card aside-recent__mini-card" href="#">
                  <div class="price mini-card__price"><span class="price__digits">4 200</span><span class="price__unit">грн.</span></div>
                  <div class="mini-card__image-box">
                    
                    <img src="images/tents/t-03.jpg" alt="tent"/>
                  </div>
                  <p class="mini-card__name">Палатка 2-местная SOL FISHER Палатка 2-местная SOL FISHER Палатка 2-местная SOL FISHER</p></a>
                
                <a class="mini-card aside-recent__mini-card" href="#">
                  <div class="price mini-card__price"><span class="price__digits">4 200</span><span class="price__unit">грн.</span></div>
                  <div class="mini-card__image-box">
                    
                    <img src="images/tents/t-03.jpg" alt="tent"/>
                  </div>
                  <p class="mini-card__name">Палатка 2-местная SOL FISHER Палатка 2-местная SOL FISHER Палатка 2-местная SOL FISHER</p></a>
                
                <a class="mini-card aside-recent__mini-card" href="#">
                  <div class="price mini-card__price"><span class="price__digits">4 200</span><span class="price__unit">грн.</span></div>
                  <div class="mini-card__image-box">
                    
                    <img src="images/tents/t-03.jpg" alt="tent"/>
                  </div>
                  <p class="mini-card__name">Палатка 2-местная SOL FISHER Палатка 2-местная SOL FISHER Палатка 2-местная SOL FISHER</p></a>
              </div>
            </div>
            <hr class="redline section-category__aside-redline">
            <div class="slider slider_dotted section-category__slider owl-carousel owl-carousel_aside">
              
              <a class="slide" href="#">
                
                <img src="images/slider/aside-slide-01.jpg" alt="slider image"/></a>
              
              <a class="slide" href="#">
                
                <img src="images/slider/aside-slide-01.jpg" alt="slider image"/></a>
              
              <a class="slide" href="#">
                
                <img src="images/slider/aside-slide-01.jpg" alt="slider image"/></a>
            </div>
          </div>


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
        </div>
      </section>
      <section class="section-article-previews">
        <div class="container section-article-previews__container">
          <h2 class="caption caption_black caption_margin caption_mobile">Статьи и обзоры</h2>
        </div>
        <div class="four-skewed section-article-previews__four-skewed">
          
          <a class="four-skewed__block" href="#">
            <div class="four-skewed__container" style="background-image: url(images/bgs/art-1.jpg);">
              <div class="four-skewed__name">
                <p>Сколько стоит стать чемпионом в горнолыжном спорте</p>
              </div>
            </div></a>
          
          <a class="four-skewed__block four-skewed__block_skewed" href="#">
            <div class="four-skewed__container" style="background-image: url(images/bgs/art-2.jpg);">
              <div class="four-skewed__name">
                <p>Северная Корея расширяет свой главный горнолыжный курорт Масик</p>
              </div>
            </div></a>
          
          <a class="four-skewed__block four-skewed__block_skewed" href="#">
            <div class="four-skewed__container" style="background-image: url(images/bgs/art-3.jpg);">
              <div class="four-skewed__name">
                <p>Стали известны участники стартового этапа Кубка мира в Зельдене</p>
              </div>
            </div></a>
          
          <a class="four-skewed__block" href="#">
            <div class="four-skewed__container" style="background-image: url(images/bgs/art-4.jpg);">
              <div class="four-skewed__name">
                <p>Школа могула для любителей  начнет работу в Казахстане</p>
              </div>
            </div></a>
        </div>
        
        <a class="button section-article-previews__all" href="articles.html"><span>Читать все</span></a>
      </section>
      <section class="section-seo-text">
        <div class="container section-seo-text__container">
          <div class="text section-seo-text__content">
            <p>На сегодняшний день в Украине существует огромное количество специализированных и интернет магазинов, где можно купить туристическую палатку любых производителей и моделей.</p>
            <p>Цена палатки в интернет магазинах будет несколько отличаться в сторону покупателя, по сравнению со специализированными стационарными магазинами. Это объясняется тем, что для интернет-магазина нет необходимости содержать большой склад с продукцией, что значительно уменьшает постоянные затраты компании. Кроме того, в онлайн шоппинге существует большое количество программ лояльности для покупателя, наличие гибкой системы скидок и т.д. Поэтому, можете быть уверены, что палатка для рыбалки, приобретенная в нашем магазине, обойдется вам значительно дешевле, чем в стационарном магазине.</p>
          </div>
        </div>
      </section>
    </main>
    <!-- main content ends-->
<?php get_footer(); ?>
