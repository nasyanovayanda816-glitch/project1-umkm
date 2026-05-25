<!-- KATEGORI -->
<div class="section-title">

    <h3>Kategori Menu</h3>

</div>

<div class="categories">

    <button class="category active" data-filter="all">
        <i class="fa-solid fa-layer-group"></i>
        Semua
    </button>

    <button class="category" data-filter="snack">
        <i class="fa-solid fa-cake-candles"></i>
        Snack
    </button>

    <button class="category" data-filter="catering">
        <i class="fa-solid fa-burger"></i>
        Catering
    </button>

</div>


<!-- MENU -->
<?php
$queryProduk = mysqli_query($conn, "SELECT * FROM produk ORDER BY id_produk DESC");
?>

<div class="food-grid">

<?php while($produk = mysqli_fetch_assoc($queryProduk)) : ?>

    <div class="food-card" 
         data-category="<?= strtolower($produk['kategori']); ?>">

        <div class="food-image">

            <img src="../admin/assets/img/<?= $produk['foto']; ?>" 
                 alt="<?= $produk['nama_produk']; ?>">

            <span class="discount">
                <?= $produk['kategori']; ?>
            </span>

        </div>

        <div class="food-info">

            <div>

                <h4><?= $produk['nama_produk']; ?></h4>

                <p>
                    Rp <?= number_format($produk['harga'],0,',','.'); ?>
                </p>

            </div>

            <button>+</button>

        </div>

    </div>

<?php endwhile; ?>

</div>



<script>

const filterButtons = document.querySelectorAll(".category");
const cards = document.querySelectorAll(".food-card");

filterButtons.forEach(button => {

    button.addEventListener("click", () => {

        document
            .querySelector(".category.active")
            .classList.remove("active");

        button.classList.add("active");

        const filter = button.getAttribute("data-filter");

        cards.forEach(card => {

            if(filter === "all"){

                card.style.display = "block";

            } 
            else if(card.getAttribute("data-category") === filter){

                card.style.display = "block";

            } 
            else{

                card.style.display = "none";

            }

        });

    });

});

</script>