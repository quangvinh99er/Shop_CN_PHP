<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/product.php';?>
<?php
    $product = new product();
    if(!isset($_GET['productid']) || $_GET['productid'] ==NULL){
        echo "<script>window.location = 'productlist.php'</script>";
    }else{
        $id = $_GET['productid'];
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $productName = $_POST['productName'];
        
        $updateProduct = $product->update_product($_POST,$_FILES,$id);


    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa sản phẩm</h2>
        <div class="block">

            <?php
                    if(isset($updateProduct)){
                        echo $updateProduct;
                    }
            ?> 
                <?php 
                    $get_product_id = $product->getbyId($id);
                    if($get_product_id){
                        while ($result_p = $get_product_id->fetch_assoc()) {
                          
                ?>            
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên sản phẩm</label>
                    </td>
                    <td>
                        <input type="text" name="productName" value="<?php echo $result_p['productName']

                        ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Danh mục</label>
                    </td>
                    <td>
                        <select id="select" name="catId">
                            <option>---Chọn danh mục---</option>


                            <?php
                                $cat = new category();
                                $catlist = $cat->show_category();
                                if($catlist){
                                    while ($result = $catlist->fetch_assoc()) {

                            ?>
                            <option

                            <?php if($result['catId'] == $result_p['catId']){echo 'selected';} ?>

                             value="<?php echo $result['catId'] ?>"><?php echo $result['catName']?></option>
                         <?php
                     }
                            }
                         ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Thương hiệu </label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                        
                            <option>-----Chọn thương hiệu-----</option>
                            <?php
                                $brand = new brand();
                                $brandlist = $brand->show_brand();
                                if($brandlist){
                                    while ($result = $brandlist->fetch_assoc()) {

                            ?>
                            <option

                            <?php if($result['brandId'] == $result_p['brandId']){echo 'selected';} ?>
                             value="<?php echo $result['brandId'] ?>"><?php echo $result['brandName'] ?></option>
                            <?php
                     }
                            }
                         ?>
                            
                        </select>
                    </td>
                </tr>
                
                 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô tả</label>
                    </td>
                    <td>
                        <textarea name="product_desc" class="tinymce" ><?php echo $result_p['product_desc']

                        ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Giá bán</label>
                    </td>
                    <td>
                        <input type="text" name="price" value="<?php echo $result_p['price']

                        ?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Ảnh sản phẩm</label>
                    </td>
                    <td>
                        <img src="uploads/<?php echo $result_p['image'] ?>" width="80" ><br>
                        <input type="file" name="image" />
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label>Loại sản phẩm</label>
                    </td>
                    <td>
                        <select id="select" name="type_p">

                            <option>Chọn loại sản phẩm</option>
                            <?php
                                if ($result_p['type_p']==1) {
                                
                            ?>

                            <option selected value="1">Nổi bật</option>
                            <option value="2">Không nổi bật</option>
                            <?php
                                }else{

                            ?>
                            <option value="1">Nổi bật</option>
                            <option selected value="2">Không nổi bật</option>
                            <?php
                                }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Cập nhật" />
                    </td>
                </tr>
            </table>
            </form>

            <?php
                }
            }

            ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


