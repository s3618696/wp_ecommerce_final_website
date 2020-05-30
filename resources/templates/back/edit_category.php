<?php 
if(isset($_GET['edit_category_id'])) {
    $query = query("SELECT * FROM categories WHERE cat_id = " . escape_string($_GET['edit_category_id']) . " ");
    confirm($query);
    while($row = fetch_array($query)) {
        $title          = escape_string($row['cat_title']);
    }
    update_category();
}
?>

<h1 class="page-header">
  Product Categories
</h1>

<div class="col-md-4">
    <form action="" method="post">
        <div class="form-group">
            <label for="category-title">Title</label>
            <input name="cat_title" type="text" class="form-control" value="<?php echo $title; ?>">
        </div>

        <div class="form-group">
            <input name="update_category" type="submit" class="btn btn-primary" value="Update Category">
        </div>      
    </form>
</div>