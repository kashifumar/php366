
<section id="middle-container">
    <div id="middle-top"></div>
    <div id="middle-middle">
        <div id="middle-left">
            <div id="categories-box">
                <div id="category-heading">Categories</div>
                <div id="categories">
                    <ul>
                        <?php
                        $brands = Brand::get_brands();
                        foreach ($brands as $brand) {
                            echo("<li><a href='" . BASE_URL . "products/products.php?brand=$brand->name'>$brand->name</a></li>");
                        }
                        ?>                                

                    </ul>
                </div>
                <div id="news-letter-box">
                    <div id="news-letter-heading">Newsletter</div>
                    <form action="#" method="post">
                        <div>
                            <input type="text" id="name" name="name" value="Name" />
                        </div>
                        <div>
                            <input type="text" id="email" name="email" value="Email" />
                        </div>
                        <input type="image" src="images/subscribe.png" id="subscribe" alt="Subscribe" />
                    </form>
                </div>
            </div>
        </div>
        <div id="middle-right">
            <div class="spacer20pxH"></div>
