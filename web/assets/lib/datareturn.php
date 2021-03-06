<?php
    header('Content-Type: application/json');
    include("queryFactory.php");
    // session_start();

    if(isset($_GET["i"])){
        switch($_GET["i"]){
            case 1:
                $email = $_SESSION['email'];
                echo selectDataSQL("SELECT * FROM users WHERE email='$email'");
            break;
            case 2:
                echo selectDataSQL("SELECT * FROM event_type");
            break;
            case 3:
                echo '{"data":'.selectDataSQL("SELECT event.*,event_type.name FROM event
                    INNER JOIN event_type ON event.et_id=event_type.id WHERE show_status = 1")."}";
            break;
            case 4:
                echo selectDataSQL("SELECT * FROM form_config");
            break;
            case 5:
                echo selectDataSQL("SELECT * FROM event");
            break;
            case 6:
                echo '{"data":'.selectDataSQL("SELECT *,IF(status, 'true', 'false') status FROM ip_address")."}";
            break;
            case 7:
                echo '{"data":'.selectDataSQL("SELECT agency_item.floor,agency_item.code_place,agency_item.owner,agency_item.name,agency_item.detail,building.name as bd_name,category.name as cat_name FROM agency_item 
                JOIN building ON building.id = agency_item.bd_id JOIN category ON category.id = agency_item.cat_id")."}";
            break;
            case 8:
                echo selectDataSQL("SELECT * FROM building");
            break;
            case 9:
                echo selectDataSQL("SELECT * FROM category");
            break;
            case 10:
                echo '{"data":'.selectDataSQL("SELECT event.*,event_type.name,COUNT(log_event.event_id) as Views FROM event 
                    INNER JOIN event_type ON event.et_id = event_type.id 
                    LEFT JOIN log_event ON event.gen_id = log_event.event_id 
                    WHERE show_status = 1
                    group by event.id")."}";
            break;
            case 11:
                echo '{"data":'.selectDataSQL("SELECT agency_item.id,agency_item.floor,agency_item.code_place,agency_item.owner,agency_item.name,
                agency_item.detail,building.name as bd_name,category.name as cat_name,COUNT(log_agency.agen_id) as Views
                FROM agency_item 
                JOIN building ON building.id = agency_item.bd_id 
                JOIN category ON category.id = agency_item.cat_id
                LEFT JOIN log_agency ON agency_item.id = log_agency.agen_id
                WHERE show_status = 1
                group by agency_item.id")."}";
                break;
            case 12:
                $data =  json_decode(selectDataSQL("SELECT agency_item.name,COUNT(log_agency.agen_id) as Views FROM agency_item
                LEFT JOIN log_agency ON agency_item.kiosk_id = log_agency.agen_id
                WHERE show_status = 1
                group by agency_item.id
                ORDER BY Views DESC
                LIMIT 10"),true);
                $view = [];
                $name = [];
                foreach($data as $key=>$value) {
                    $view[$key] = $value['Views'];
                    $name[$key] = $value['name'];
                }
                $newdata;
                $newdata['view'] = $view;
                $newdata['name'] = $name;
                // echo json_encode($data);
                echo json_encode($newdata);
                break;
            case 13:
                $data =  json_decode(selectDataSQL("SELECT event.title,COUNT(log_event.event_id) as Views FROM event
                LEFT JOIN log_event ON event.gen_id = log_event.event_id
                WHERE show_status = 1
                group by event.id
                ORDER BY Views DESC
                LIMIT 10"),true);
                $view = [];
                $name = [];
                foreach($data as $key=>$value) {
                    $view[$key] = $value['Views'];
                    $name[$key] = $value['title'];
                }
                $newdata;
                $newdata['view'] = $view;
                $newdata['name'] = $name;
                echo json_encode($newdata);
            break;
            case 14:
                $start_date = $_GET['start_date'];
                $end_date = $_GET['end_date'];
                echo '{"data":'.selectDataSQL("SELECT event.*,event_type.name,COUNT(log_event.event_id) as Views FROM event 
                    INNER JOIN event_type ON event.et_id = event_type.id 
                    LEFT JOIN log_event ON event.gen_id = log_event.event_id 
                    WHERE show_status = 1 AND  DATE(time) BETWEEN '$start_date' AND '$end_date'
                    group by event.id")."}";
            break;
            case 15:
                $start_date = $_GET['start_date'];
                $end_date = $_GET['end_date'];
                echo '{"data":'.selectDataSQL("SELECT agency_item.id,agency_item.floor,agency_item.code_place,agency_item.owner,agency_item.name,
                    agency_item.detail,building.name as bd_name,category.name as cat_name,COUNT(log_agency.agen_id) as Views
                    FROM agency_item 
                    JOIN building ON building.id = agency_item.bd_id 
                    JOIN category ON category.id = agency_item.cat_id
                    LEFT JOIN log_agency ON agency_item.id = log_agency.agen_id
                    WHERE show_status = 1 AND  DATE(time) BETWEEN '$start_date' AND '$end_date'
                    group by agency_item.id")."}";
            break;
            case 16:
                $start_date = $_GET['start_date'];
                $end_date = $_GET['end_date'];
                $data =  json_decode(selectDataSQL("SELECT agency_item.name,COUNT(log_agency.agen_id) as Views FROM agency_item
                LEFT JOIN log_agency ON agency_item.kiosk_id = log_agency.agen_id
                WHERE show_status = 1 AND DATE(time) BETWEEN '$start_date' AND '$end_date'
                group by agency_item.id
                ORDER BY Views DESC
                LIMIT 10"),true);
                $view = [];
                $name = [];
                foreach($data as $key=>$value) {
                    $view[$key] = $value['Views'];
                    $name[$key] = $value['name'];
                }
                $newdata;
                $newdata['view'] = $view;
                $newdata['name'] = $name;

                echo json_encode($newdata);
            break;
            case 17:
                $start_date = $_GET['start_date'];
                $end_date = $_GET['end_date'];
                $data =  json_decode(selectDataSQL("SELECT event.title,COUNT(log_event.event_id) as Views FROM event
                LEFT JOIN log_event ON event.gen_id = log_event.event_id
                WHERE show_status = 1 AND DATE(time) BETWEEN '$start_date' AND '$end_date'
                group by event.id
                ORDER BY Views DESC
                LIMIT 10"),true);
                $view = [];
                $name = [];
                foreach($data as $key=>$value) {
                    $view[$key] = $value['Views'];
                    $name[$key] = $value['title'];
                }
                $newdata;
                $newdata['view'] = $view;
                $newdata['name'] = $name;

                echo json_encode($newdata);
            break;
        }
    }
    else if(isset($_POST["i"])){
        switch($_POST["i"]){
            case 102:
                $id = $_POST['id'];
                logAdmin(22);
                echo queryData("UPDATE event SET show_status = 0 WHERE id='$id'");
            break;
            case 103:
                $id = $_SESSION['uid'];
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $pass = sha1(md5($pass));
                logAdmin(23);
                echo queryData("UPDATE users SET email = '$email',firstname ='$firstname', lastname = '$lastname', 
                password='$pass',modified = CURRENT_TIMESTAMP() WHERE id='$id'");
            break;
            case 104:
                $email = $_POST['email'];
                $pass = $_POST['password'];
                echo checkUserPass($email,$pass);
            break;
            case 105:
                $email = $_POST['email'];
                $pass = $_POST['password'];
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $pass = sha1(md5($pass));
                
                $check = checkData1field($email);
                if($check === true) {
                    logAdmin(24);
                    echo queryData("INSERT INTO users (firstname,lastname,email,password) VALUE ('$firstname','$lastname','$email','$pass')");
                }
                else {
                    echo '{"data":"Failed"}';
                }
                // echo queryDataLastID("INSERT INTO users (firstname,lastname,email,password) VALUE ('$firstname','$lastname','$email','$pass')");
                // echo checkData1field($email);
            break;
            case 106:
                $title = $_POST['title'];
                $event_type = $_POST['event_type'];
                $details = $_POST['details'];
                logAdmin(20);
                $id = queryDataLastID("INSERT INTO event (title,detail,et_id,show_status) VALUE ('$title','$details','$event_type',1)");
                // echo $id;
                $last_id = json_decode($id,true);
                $data_pic = json_decode(upload_pic(),true);
                foreach($data_pic as $key=>$value) {
                    $e_id = $last_id['id'];
                    $nmae = $value['name'];
                    $gen_name = $value['gen_name'];
                    echo queryData("INSERT INTO picture (p_name,gen_p_name,e_id) VALUE ('$nmae','$gen_name',$e_id)");
                }
            break;
            // not working
            case 107:
                $id = $_POST['id'];
                $data_video = json_decode(upload_video(),true);
                foreach($data_video as $key=>$value) {
                    $nmae = $value['name'];
                    $gen_name = $value['gen_name'];
                    queryData("INSERT INTO video (v_name,gen_v_name,e_id) VALUE ('$nmae','$gen_name','$id')");
                }
                // echo '{"data":"faile"}';
            break;
            case 108:
                $text_th = $_POST['text_th'];
                $text_eng = $_POST['text_eng'];
                $text_ch = $_POST['text_ch'];
                $f_size = $_POST['f_size'];
                $f_speed = $_POST['f_speed'];
                logAdmin(18);
                echo queryData("INSERT INTO form_config 
                (id, text, f_size, f_speed)
                VALUES 
                    (1, '$text_th', '$f_size','$f_size'),
                    (2, '$text_eng', '$f_size','$f_size'),
                    (3, '$text_ch', '$f_size','$f_size')
                ON DUPLICATE KEY UPDATE 
                text = VALUES(text),
                f_size = VALUES(f_size),
                f_speed = VALUES(f_speed)");
            break;
            case 109:
                $id = $_POST['id'];
                echo selectDataSQL("SELECT * FROM event WHERE id = $id");
            break;
            case 110:
                $id = $_POST['e_id'];
                logAdmin(21);
                // echo $id;
                // echo selectDataSQL("SELECT * FROM picture WHERE e_id = $id");
                $data = json_decode(selectDataSQL("SELECT * FROM picture WHERE e_id = $id"),true);
                foreach($data as $key=>$value){
                    $data[$key]['path'] = '../../picture/'.$value['gen_p_name'];
                    $data[$key]['size'] = filesize('../../picture/'.$value['gen_p_name']);;
                }
                echo json_encode($data);
            break;
            case 111:
                $id = $_POST['e_id'];
                $data = json_decode(selectDataSQL("SELECT * FROM video WHERE e_id = $id"),true);
                foreach($data as $key=>$value){
                    $data[$key]['path'] = '../../video/'.$value['gen_v_name'];
                    $data[$key]['size'] = filesize('../../video/'.$value['gen_v_name']);;
                }
                echo json_encode($data);
            break;
            case 112:
                $id = $_POST['id'];
                $title = $_POST['title'];
                $event_type = $_POST['event_type'];
                $detail = $_POST['details'];
                echo queryData("UPDATE event SET title ='$title', detail = '$detail', et_id='$event_type' WHERE id='$id'");
            break;
            case 113:
                $p_id = $_POST['p_id'];
                $p_path = $_POST['p_path'];
                $id = $_POST['id'];
                $data_pic = json_decode(upload_pic(),true);
                // echo $data_pic;
                foreach($data_pic as $key=>$value) {
                    $nmae = $value['name'];
                    $gen_name = $value['gen_name'];
                    echo queryData("UPDATE picture SET p_name ='$nmae', gen_p_name = '$gen_name' WHERE p_id='$p_id'");
                }
                unlink($p_path);
                break;
            case 114:
                $v_id = $_POST['v_id'];
                $v_path = $_POST['v_path'];
                unlink($v_path);
                $data_pic = json_decode(upload_video(),true);
                foreach($data_pic as $key=>$value) {
                    $nmae = $value['name'];
                    $gen_name = $value['gen_name'];
                    echo queryData("UPDATE video SET v_name ='$nmae', gen_v_name = '$gen_name' WHERE v_id='$v_id'");
                }
                break;
            case 115:
                $id = $_POST['id'];
                $status = $_POST['status'];
                echo queryData("UPDATE ip_address SET status = $status  WHERE ip_id='$id'");
                break;
            case 116:
                // echo selectDataSQL("SELECT * FROM event JOIN picture ON event.id = picture.e_id");
                $data = json_decode(selectDataSQL("SELECT * FROM event JOIN picture ON event.id = picture.e_id"),true);
                // echo $data[0]['gen_p_name'];
                foreach($data as $key=>$value){
                    $data[$key]['path'] = 'picture/'.$value['gen_p_name'];
                }
                echo json_encode($data);
            break;
            case 117:
                $data_theme = json_decode(upload_theme(),true);
                logAdmin(15);
                foreach($data_theme as $key=>$value) {
                    $nmae = $value['name'];
                    $gen_name = $value['gen_name'];
                    queryData("INSERT INTO theme (theme_name,gen_theme_name) VALUE ('$nmae','$gen_name')");
                }
                echo '{"data":"Success"}';
            break;
            case 118:
                $data = json_decode(selectDataSQL("SELECT id,gen_theme_name FROM theme"),true);
                foreach($data as $key=>$value){
                    $data[$key]['path'] = '../../theme/'.$value['gen_theme_name'];
                }
                echo json_encode($data);
            break;
            case 119:
                $id = $_POST['id'];
                echo selectDataSQL("SELECT t_id FROM ip_address WHERE ip_id='$id'");
            break;
            case 120:
                $t_id = $_POST['t_id'];
                logAdmin(16);
                echo queryData("UPDATE ip_address SET t_id = '$t_id'");
            break;
            case 121:
                $id = $_POST['id'];
                $t_id = $_POST['t_id'];
                echo queryData("UPDATE ip_address SET t_id = '$t_id' WHERE ip_id = '$id'");
            break;
            case 122:
                logAdmin(14);
                echo queryData("UPDATE ip_address SET status = 0");
            break;
            case 123:
                $link = $_POST['link'];
                $minute = $_POST['minute'];
                echo queryData("UPDATE ip_address SET liveURL = '$link', time_video = '$minute'");
            break;
            case 124:
                $data = json_decode(selectDataSQL("SELECT time_video,liveURL FROM ip_address WHERE ip_id='1'"),true);
                foreach($data as $key=>$value){
                    $data[$key]['time_video'] = $data[$key]['time_video'] * 60 * 1000;
                }
                echo json_encode($data);
            break;
            case 125:
                echo selectDataSQL("SELECT time_video,liveURL FROM ip_address WHERE ip_id='1'");
            break;
            case 126:
                $email = $_POST['email'];
                echo checkEmail($email);
            break;
            case 127:
                logAdmin(19);
                echo '{"data":'.selectDataSQL("SELECT log_admin.*,CONCAT(users.firstname,' ',users.lastname) as user,
                    count(log_admin.user_id) as log FROM log_admin
                    INNER JOIN admin_activity ON log_admin.activity_id = admin_activity.id
                    JOIN users ON users.id = log_admin.user_id GROUP BY users.id
                    ").'}';
                    
                    // foreach($data as $key=>$value){
                    //     $id = $data[$key]['user_id'];
                    //     $data[$key]['log_admin'] = json_decode(selectDataSQL("SELECT log_admin.id,admin_activity.name,log_admin.timestamp FROM log_admin
                    //         INNER JOIN admin_activity ON log_admin.activity_id = admin_activity.id
                    //         WHERE user_id = '$id'"),true);;
                    // }
                // echo '{"data":'.json_encode($data).'}';
            break;
            case 128:
                $id = $_POST['id'];
                echo '{"data":'.selectDataSQL("SELECT log_admin.id,admin_activity.name,log_admin.timestamp FROM log_admin
                            INNER JOIN admin_activity ON log_admin.activity_id = admin_activity.id
                            WHERE user_id = '$id'").'}';
            break;
            case 129:
                echo '{"data":'.selectDataSQL("SELECT agency_item.*,building.name as bd_name,category.name as cat_name FROM agency_item 
                    JOIN building ON building.id = agency_item.bd_id JOIN category ON category.id = agency_item.cat_id 
                    WHERE changed_status = 1")."}";
            break;
            case 130:
                logAdmin(13);
                echo queryData("UPDATE ip_address SET status = 1");
            break;
            case 131:
                logAdmin(17);
                echo queryData("UPDATE ip_address SET status = 2");
            break;
            case 132:
                $id = $_POST['id'];
                echo logAdmin($id);
            break;
            case 133:
                $id = $_POST['id'];
                // logAdmin(17);
                echo queryData("UPDATE ip_address SET status = 2 WHERE ip_id = '$id'");
            break;
        }
    }


    
?>