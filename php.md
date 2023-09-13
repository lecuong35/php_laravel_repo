# PHP cơ bản
## Các biến trong PHP
1. ***Các loại biến thường gặp***
    
    * **Biến cục bộ** - khai báo và sử dụng trong một hàm hoặc phương thức
    * **Biến toàn cục** - khai báo bên ngoài các hàm và có thể truy cập ở mọi nơi trong chương trình
    * **Biến tĩnh** - được khai báo trong hàm nhưng giá trị được giữ là giá trị mới nhất khi hàm được gọi.
    * **Biến siêu toàn cục** - ví dụ như $_GET, $_POST, $_SESSION, $_COOKIE, $_SERVER, $_REQUEST, $_ENV 

## Mảng và các hàm xử lý với mảng
1. ***Các loại mảng trong PHP***
    * **mảng thông thường** - đánh index theo thứ tự
    * **mảng dictionary** - lưu theo key-value
  
2. ***Các hàm xử lý mảng***
   * **in_array** - check tồn tại trong mảng
   * **array_merge** - gộp mảng
   * **array_slice** - tạo mảng con từ mảng có sẵn
   * **array_map** - tạo mảng mới từ mảng có sẵn và thực thi khối lệnh
   * **array_filter** - tạo mảng mới bằng cách lọc các phần tử của mảng cũ theo điều kiện
   * **implode** - biến mảng thành chuỗi
  
## Chuỗi và các hàm xử lý với chuỗi
1. ***Các hàm xử lý chuỗi***
   * **.=** - dùng để nối chuỗi
   * **sử dụng dấu "$text_1 $text_2"** - cũng để nối chuỗi
   * **strlen** - đếm phần tử
   * **explode** - biến chuỗi thành mảng
  
## OOP với PHP
1. ***Class trong PHP***
    * **Lớp thông thường**
        - chứa các thuộc tính và phương thức không rỗng
    * **Abstract class**
        - là các lớp chứa các thuộc tính, chứa ít nhất một phương thức trừu tượng - chỉ có chữ ký
        - các lớp kế thừa abstract class phải overide lại phương thức đó --> tính đa hình
        - không hỗ trợ kế thừa nhiều lớp abstract
        ```php
        abstract class Animal {
            abstract public function makeSound();
        }

        class Dog extends Animal {
            public function makeSound() {
                echo "Woof!";
            }
        }
        ```
    * **Interface**
        - chỉ chứa phương thức trừ tượng
        - các lớp có thể implement nhiều interfaces
        ```php
        interface Shape {
            public function calculateArea();
            public function calculatePerimeter();
        }

        class Rectangle implements Shape {
            public function calculateArea() {
                // Tính diện tích hình chữ nhật
            }

            public function calculatePerimeter() {
                // Tính chu vi hình chữ nhật
            }
        }
        ``` 
    * **Trait**
        - là một cách để chia sẻ mã nguồn giữa các lớp mà không cần kế thừa
        - nếu không tìm thấy trait -> dừng chương trình, sử dụng hàm trait_exists để kiểm tra.
        ```php
        trait Loggable {
            public function log($message) {
                echo "Logging: " . $message;
            }
        }

        class User {
            use Loggable;

            public function login() {
                // Đăng nhập
                $this->log("User logged in");
            }
        }
        ```
    * **Module**
        - có thể coi tệp tin được include, require như một module
        - include - import file nếu không tìm thấy thì báo warning
        - include_once - nếu import lần 2 thì bỏ qua lần đó tiếp tục chương trình
        - require - như include nhưng sẽ dừng chương tình nếu không tìm thấy file
        - tương tự cho require_once
        - nếu include hoặc require 2 lần thì chương trình sẽ thực thi file đó 2 lần -> lỗi không kiểm soát đc

2. ***Các tính chất và nguyên tắc thiết kế***
    * **Dependency Injection**
        - là một nguyên tắc thiết kế, các phụ thuộc của m ột đối tượng được chuyển vào từ bên ngoài thay vì bên trong  --> giúp giảm sự phụ thuộc của các lớp
        - làm cho các chức năng dễ test hơn, đảm bảo tính dễ bảo trì

## DB trong PHP
1. ***Connect DB***
    * **Sử dụng PDO**
    ```php
        $servername = "localhost";
        $username = "your_username";
        $password = "your_password";
        $dbname = "your_database";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    ```

2. ***Query DB trong PHP***
    * **Sử dụng PDO**
    ```php
        $servername = "localhost";
        $username = "your_username";
        $password = "your_password";
        $dbname = "your_database";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT * FROM your_table");
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                // Xử lý dữ liệu từ mỗi hàng
                echo $row['column_name'];
            }
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    ````

3. ***Các nguyên tắc với PDO***
    * **Vòng đời của PDO**
        - Tạo connect tới DB --> $conn
        - chuẩn bị query --> prepare("SQL_QUERY")
        - xử lý các câu lệnh query --> exec, excute
        - sau khi gửi các câu lệnh muốn đóng query --> $conn = null;

## API với PHP
1. ***RESTful API với PHP***
2. ***JWT, CORS, CRSF với PHP***

## FE framework với PHP
1. ***Bootstrap với PHP***
2. ***Cách chia file FE trong PHP***

## MVC với PHP
1. ***Mô hình MVC***
2. ***.htaccess***