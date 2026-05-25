<!-- NAMA PRODUK -->
<div class="input-group-modern">

    <label>Nama Produk</label>

    <input
    type="text"
    name="nama_produk"
    value="<?= $produk['nama_produk']; ?>"
    required>

</div>

<!-- HARGA -->
<div class="input-group-modern">

    <label>Harga Produk</label>

    <input
    type="number"
    name="harga"
    value="<?= $produk['harga']; ?>"
    required>

</div>

<!-- STOK -->
<div class="input-group-modern">

    <label>Stok Produk</label>

    <input
    type="number"
    name="stok"
    value="<?= $produk['stok']; ?>"
    required>

</div>

<!-- KATEGORI -->
<div class="input-group-modern">

    <label>Kategori</label>

    <select
    name="kategori"
    class="form-control modern-select"
    required>

        <option value="Snack"
        <?= ($produk['kategori'] == 'Snack') ? 'selected' : ''; ?>>

            Snack

        </option>

        <option value="Catering"
        <?= ($produk['kategori'] == 'Catering') ? 'selected' : ''; ?>>

            Catering

        </option>

    </select>

</div>

<!-- DESKRIPSI -->
<div class="input-group-modern">

    <label>Deskripsi Produk</label>

    <textarea
    name="deskripsi"
    rows="5"
    class="modern-textarea"
    required><?= $produk['deskripsi']; ?></textarea>

</div>

<!-- FOTO -->
<div class="input-group-modern">

    <label>Ganti Foto</label>

    <input
    type="file"
    name="foto"
    id="foto">

</div>