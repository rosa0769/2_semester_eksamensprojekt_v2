<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="profile" href="https://gmpg.org/xfn/11" />
<?php wp_head(); ?>
</head>

<div id="page" class="site">
    <header id="masthead" class="<?php echo is_singular() && twentynineteen_can_show_post_thumbnail() ? 'site-header featured-image' : 'site-header'; ?>">
        <div class="site-branding-container">
            <?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
        </div>
        <section id="section" class="content-area">
            <h2 id="headline">All products</h2>

            <nav class="filter_section">
                <div id="all_products" class="buttonContainer">
                    <button id="filterbutton" class="chosen" data-kategori="all_products">All products</button>
                </div>

                <div id="category1" class="buttonContainer">
                    <button id="filterbutton" class="" data-kategori="solar_panels">Solar panels</button>
                </div>

                <div id="category2" class="buttonContainer">
                    <button id="filterbutton" class="" data-kategori="inverters">Inverters</button>
                </div>

                <div id="category3" class="buttonContainer">
                    <button id="filterbutton" class="" data-kategori="storage_solutions">Storage solutions</button>
                </div>

                <div id="category4" class="buttonContainer">
                    <button id="filterbutton" class="" data-kategori="roof_sandwich_panels">Roof sandwich panels</button>
                </div>

                <div id="category5" class="buttonContainer">
                    <button id="filterbutton" class="" data-kategori="mounting_systems">Mounting systems</button>
                </div>
            </nav>

            <main id="main" class="site-main">
                <section id="overview"></section>
            </main>

            <template>
                <article class="the_product">
                    <h3 class="product_name"></h3>
                    <img src="" alt="" class="product_image" />
                    <div>
                        <p class="product_description"></p>
                        <p class="product_price"></p>
                        <p class="product_category"></p>
                        <button class="seeMore">See more</button>
                    </div>
                </article>
            </template>

<script>
let products;
let filter = "all_products";
let newHeadline = document.querySelector("#headline");

// URL til RestDB
const url = "https://rosasahlholt.one/kea/2_semester/10_eksamensprojekt/powerroof_v2/index.php/wp-json/wp/v2/product?per_page=20";

// Const for destinationen af indholdet og templaten
const destination = document.querySelector("#overview");
let template = document.querySelector("template");

// Asynkron function som afventer og indhenter json data fra RestDB
async function fetchData() {
    const jsonData = await fetch(url);
    products = await jsonData.json();
    showProducts();
}

const filterButtons = document.querySelectorAll("#filterbutton");
filterButtons.forEach(button => button.addEventListener("click", filterMenu));

function filterMenu() {
    console.log(this.textContent);

    // Sætter filters værdi lig med værdien fra data af den knap der førte ind i funktionen
    filter = this.textContent;

    // Ændrer overskriften
    newHeadline.textContent = this.textContent + "";

    // Fjerner og tilføjer valgt class til den rigtige knap
    document.querySelector(".chosen").classList.remove("chosen");
    this.classList.add("chosen");

    // Kalder function showProducts efter det nye filter er sat på
    showProducts();
}

function showProducts() {
    console.log(products);
    destination.textContent = "";

    products.forEach(product => {
        if (filter == product.product_category || filter == "all_products") {
            const clone = template.cloneNode(true).content;
            clone.querySelector(".product_name").textContent = product.product_name;
            clone.querySelector(".product_image").src = "/kea/2_semester/10_eksamensprojekt/powerroof_v2/wp-content/themes/twentyninteen-child/img/" + product.product_name.replace(/[^a-z0-9]/gi, '_').toLowerCase() + ".jpg"; // Quickfix pga. fejl i RestDB
            clone.querySelector(".product_description").textContent = product.product_description;
            clone.querySelector(".product_price").textContent = "Price: €" + product.product_price;
            clone.querySelector(".seeMore").addEventListener("click", () => location.href=product.link);


            destination.appendChild(clone);
        }
    });
}
fetchData();
</script>

</section>
<?php get_footer();