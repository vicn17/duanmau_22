<?php
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
            //Danh mục sản phẩm
            case 'category':
                //* Load all category from database
                $kq = getall_cate();
                include "../admin/view/danhmucsanpham.php";
                break;
            case 'addcate':
                //* Add new category to database
                if(isset($_POST['add'])){
                    $name_cate = str_replace(' ','-',$_POST['name_cate']);
                    $status = $_POST['status'];
                    addcate($name_cate, $status);
                    $kq = getall_cate();
                    include '../admin/view/danhmucsanpham.php';
                    echo '<script>                         
                            swal("Thêm thành công","", "success");
                        </script>';
                }
                break;
            case 'del_cate':
                //* Delect category by id category
                if(isset($_GET['id'])){
                    $id_cate = $_GET['id'];
                    delete_cate($id_cate);
                }
                $kq = getall_cate();
                include '../admin/view/danhmucsanpham.php';
                echo '<script>
                    swal("Đã xóa danh mục","","success")
                </script>';
                break;
            case 'editCate':
                //* Get and show category by id
                if(isset($_GET['id'])){
                    $id_cate = $_GET['id'];
                    $kq = getone_cate($id_cate);
                    include '../admin/view/updatecate.php';
                }
                //* Edit category by id
                if(isset($_POST['update'])){
                    $id_cate = $_POST['id_cate'];
                    $name_cate = $_POST['name_cate'];
                    $status = $_POST['status'];
                    edit_cate($name_cate, $id_cate, $status);
                    // $kq = getall_cate();
                    $kq = getone_cate($id_cate);
                    include '../admin/view/updatecate.php';
                    echo '<script>                         
                        swal("Sửa thành công","", "success");
                    </script>';
                }
                break;

                //sản phẩm
                case 'produce':
                    //* Get all product from database
                    $kqPro = getall_produce();
                    include './view/sanpham.php';
                    break;
                case 'addProduce':
                    //* Add new product to database
                    if(isset($_POST['btnAddProduce'])){
                        $name_pro = $_POST["name_pro"];
                        $price = $_POST["price"];
                        $name_cate = $_POST["name_cate"];
                        //* Get img to folder uploads/img and get name img to database
                        $img = str_replace(' ','_',($name_pro."_".$_FILES['imgFile']['name']));
                        $target_dir = "../uploads/img/";
                        $target_file = $target_dir .str_replace(' ','_',($name_pro."_")). basename($_FILES["imgFile"]["name"]);
                        // $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        move_uploaded_file($_FILES['imgFile']['tmp_name'], $target_file);
                        addProduce($name_pro, $price, $name_cate, $img);
                        $kqPro = getall_produce();
                        include './view/sanpham.php';
                        echo '<script>                         
                        swal("Thêm thành công","'.$name_pro.'", "success");
                        </script>';
                        // sleep(1).header('location: ./index.php?act=produce');
                    }
                    break;
                case 'del_produce':
                    //* Delect product by id and delect img from folder uploads/img
                    if(isset($_GET['id'])){
                        $id_pro = $_GET['id'];
                        $img = $_GET['img'];
                        if(file_exists("'../uploads/img/'.$img")){
                            unlink('../uploads/img/'.$img);
                        }
                        delete_produce($id_pro);
                    }
                    $kqPro = getall_produce();
                    include './view/sanpham.php';
                    echo '<script>                         
                        swal("Đã xóa sản phẩm","", "success");
                    </script>';
                    break;
                case 'editProduce':
                    //* Get and show product by id
                    if(isset($_GET['id'])){
                        $id_pro = $_GET['id'];
                        $kqPro = getone_produce($id_pro);
                        include './view/updatesanpham.php';
                    }
                    //* edit product by id and update img from folder uploads'img
                    if(isset($_POST['btnUpdateProduce']) && ($_POST['btnUpdateProduce'])){
                        $id_pro = $_POST['id_pro'];
                        $name_pro = $_POST['name_pro'];
                        $price = $_POST['price'];
                        $del = $_POST['del'];
                        $name_cate = $_POST['name_cate'];
                        if($del > $price){
                            echo '<script>alert("Số tiền giảm phải nhỏ hơn số tiền gốc")</script>';
                            $kqPro = getone_produce($id_pro);
                            include './view/updatesanpham.php';
                        }
                        else{
                            if ($_FILES['imgFile']['name'] != null) {
                                unlink('../uploads/img/'.$_POST['img']);
                                $img = str_replace(' ','_',($name_pro."_".$_FILES['imgFile']['name']));
                                $target_dir = "../uploads/img/";
                                $target_file = $target_dir .str_replace(' ','_',($name_pro."_")). basename($_FILES["imgFile"]["name"]);
                                // $uploadOk = 1;
                                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                                move_uploaded_file($_FILES['imgFile']['tmp_name'], $target_file);
                            }else{
                                $img = $_POST['img'];
                            }
                            edit_produce($name_pro, $price, $del, $name_cate, $img, $id_pro);
                            // $kq = getall_cate();
                            $kqPro = getone_produce($id_pro);
                            include './view/updatesanpham.php';
                            echo '<script>                         
                                swal("Đã sửa sản phẩm","", "success");
                            </script>';
                        }
                    }
                    break;
                case 'getTypeProduce':
                    //* Show product by type category
                    if(isset($_GET['name'])){
                        $name_cate = $_GET['name'];
                        $kqPro = getType_produce($name_cate);
                        include './view/getTypeProduce.php';
                    }
                    break;
                case 'chart':
                    //* Show chart product by category
                    include './view/charts.php';
                    break;
                case 'posts':
                    include "./view/viewPosts.php";
                    break;
                case 'addPosts':
                    if((isset($_POST['submitPosts'])) && ($_POST['submitPosts'])){
                        $title_posts = str_replace(' ', '-', $_POST['titlePosts']);
                        $content_posts = $_POST['contentPosts'];
                        $img_posts = "VICN".$_FILES['imgPosts']['name'];
                        $target_dir = "../uploads/imgPosts/";
                        $target_file = $target_dir.basename($img_posts);
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        move_uploaded_file($_FILES['imgPosts']['tmp_name'], $target_file);
                        addNewPosts($title_posts, $content_posts, $img_posts);
                    }
                    header("location: {$_SERVER['PHP_SELF']}?act=posts");
                    break;
                case 'del_posts':
                    if(isset($_GET['imgPosts'])){
                        $id_posts = $_GET['id'];
                        $img_posts = $_GET['imgPosts'];
                        delete_posts($id_posts);
                        unlink("../uploads/imgPosts/{$img_posts}");
                        header("location: {$_SERVER['PHP_SELF']}?act=posts");
                    }
                    break;
                case 'comment':
                    $cmt = showCmtUserUnlimited();
                    $groupByCmt = groupByNameProCmt();
                    include "./view/comment.php";
                break;
                case 'searchCmt':
                    $user_name = $_POST['user_name'];
                    $check_name_pro = $_POST['name_pro'];
                    if($check_name_pro != "null"){
                        $name_pro = "and name_pro = '$check_name_pro'";
                    }
                    else{
                        $name_pro = "";
                    }
                    $cmt = searchCmt($user_name, $name_pro);
                    $groupByCmt = groupByNameProCmt();
                    include "./view/comment.php";
                break;
                case 'delCmt':
                    if(isset($_GET['id'])){
                        $id_cmt = $_GET['id'];
                        delete_cmt($id_cmt);
                        header("location: {$_SERVER['PHP_SELF']}?act=comment");
                    }
                    break;
                case 'order':
                    $order = showOrderUser();
                    include "./view/order.php";
                    break;
                case 'updateOrder':
                    if(isset($_POST['btnSubmitOrder']) && ($_POST['btnSubmitOrder'])){
                        $id_order = $_POST['idOrder'];
                        $statusOrder = $_POST['statusOrder'];
                        if($statusOrder != 0){
                            if($statusOrder == 1){
                                $titleContent = "VICN - Đã xác nhận đơn hàng";
                                $status = "Đơn hàng đã được VICN xác nhận";
                            }
                            elseif($statusOrder == 2){
                                $titleContent = "VICN - Đơn hàng đang được giao";
                                $status = "Đã bàn giao đơn hàng cho shipper";
                            }
                            elseif($statusOrder == 3){
                                $titleContent = "VICN - Giao hàng thành công";
                                $status = "Đơn hàng đã được giao thành công";
                                $confirmShip = "Cảm ơn bạn đã tin tưởng và ủng hộ VICN Shop <3";
                            }
                            $code_order = $_POST['codeOrder'];
                            $user_name = $_POST['userName'];
                            $email = $_POST['emailUser'];
                            $title = "VICN - Complete order confirmation";
                            $content = "<p><h1>{$titleContent}</h1></p>
                                        <p><b>Mã đơn hàng: {$code_order}</b></p>
                                        <p><b>Tên khách hàng:</b> {$user_name}</p>
                                        <p><b>Trạng thái đơn hàng:</b> {$status}</p>
                                        <p>{$confirmShip}</p>";
                            include "../model/sendMailConfirm.php";
                            paymentSuccess($title, $content, $email, $user_name);
                        }
                        updateStatusOrder($statusOrder, $id_order);
                    }
                    header("location: {$_SERVER['PHP_SELF']}?act=order");
                    break;
                case 'showAllOrder3':
                    $order = showOrderUser3();
                    include "./view/order.php";
                    break;
                case 'orderDetails':
                    $idOrder = $_GET['idOrder'];
                    $codeOrder = $_GET['codeOrder'];
                    $order = showOneOrderUser($idOrder);
                    $cart = showCartOrderUser($codeOrder);
                    include "./view/orderDetails.php";
                    break;
            default:
                # code...
                break;
        }
    }
?>