<div id="bst-toolbar">
    <form class="form-inline" role="form">
        <div class="form-group">
            <label>Offset: </label>
            <input name="offset" class="form-control w70" type="number" value="0">
        </div>
        <div class="form-group">
            <label>Limit: </label>
            <input name="limit" class="form-control w70" type="number" value="5">
        </div>
        <div class="form-group">
            <input name="search" class="form-control" type="text" placeholder="Search">
        </div>
        <button id="bst-search" type="submit" class="btn btn-default">OK</button>
    </form>
</div>
<table id="bst-table"></table>

<script>
    <?php echo getFileAllContents(public_path().'/script/backend/article.js'); ?>
</script>