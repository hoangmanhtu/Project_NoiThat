<li>
    <a href="danh-sach-san-pham">Sản phẩm </a>
    <ul>
        <?php if(!empty($categories)):
        foreach ($categories as $category):
        $category_name = $category['name'];
        $category_slug = Helper::getSlug($category_name);
        $category_id = $category['id'];
        $category_link = "san-pham/$category_slug/$category_id/1";
        ?>
        <li><a href="<?php echo $category_link; ?>"><?php echo $category_name; ?></a></li>
        <?php endforeach; ?>
        <?php else : ?>
            <li>Không có danh mục nào !!!</li>
        <?php endif; ?>
    </ul>
</li>