<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Khách hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .search-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .search-container input {
            width: 300px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-right: 10px;
        }

        .search-container button {
            padding: 10px 20px;
            background: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .search-container button:hover {
            background: #2980b9;
        }

        table {
            margin-top: 20px;
        }

        .reset-password {
            color: #3498db;
            text-decoration: none;
            cursor: pointer;
        }

        .reset-password:hover {
            text-decoration: underline;
        }

        .delete-btn {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .delete-btn:hover {
            background: #c0392b;
        }

        #message {
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
            display: none;
        }

        .success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .edit-btn,
        .save-btn {
            background: #3498db;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
        }

        .edit-btn:hover,
        .save-btn:hover {
            background: #2980b9;
        }

        .address-edit,
        .email-edit {
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 90%;
        }

        td {
            position: relative;
        }

        .edit-controls {
            display: flex;
            gap: 5px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-top: 20px;
            padding: 10px;
        }

        .pagination button {
            padding: 8px 15px;
            border: 1px solid #ddd;
            background-color: white;
            color: #333;
            cursor: pointer;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .pagination button:hover:not(:disabled) {
            background-color: #f0f0f0;
            border-color: #999;
        }

        .pagination button:disabled {
            background-color: #f5f5f5;
            color: #999;
            cursor: not-allowed;
        }

        .pagination span {
            padding: 8px 15px;
            color: #666;
        }

        .table-container {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <?php include 'sidebar.php'; ?>

    <div class="content">
        <h1>Quản lý Khách hàng</h1>

        <div class="search-container">
            <input type="email" id="searchEmail" placeholder="Nhập email người dùng...">
            <button onclick="searchUser()">Tìm kiếm</button>
        </div>

        <div id="message" style="display: none;"></div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Tài khoản</th>
                        <th>Địa chỉ</th>
                        <th>Email</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody id="customerTable">
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            loadUsers();
        });

        let currentPage = 1;
        const customersPerPage = 20;
        let allUsers = [];

        async function loadUsers() {
            try {
                const token = localStorage.getItem('token');
                if (!token) {
                    showMessage('Vui lòng đăng nhập lại', true);
                    setTimeout(() => {
                        window.location.href = '../login.php';
                    }, 2000);
                    return;
                }

                const response = await fetch('http://localhost:3000/user-service/users', {
                    headers: {
                        'Authorization': `Bearer ${token}`
                    }
                });

                if (response.status === 403) {
                    showMessage('Bạn không có quyền truy cập trang này', true);
                    setTimeout(() => {
                        window.location.href = '../login.php';
                    }, 2000);
                    return;
                }

                allUsers = await response.json();
                displayUsers(allUsers);
            } catch (error) {
                console.error('Error:', error);
                showMessage('Lỗi khi tải danh sách người dùng', true);
            }
        }

        function displayUsers(users) {
            const tableBody = document.getElementById('customerTable');
            tableBody.innerHTML = '';

            // Tính toán phân trang
            const startIndex = (currentPage - 1) * customersPerPage;
            const endIndex = startIndex + customersPerPage;
            const paginatedUsers = users.slice(startIndex, endIndex);

            // Hiển thị người dùng cho trang hiện tại
            paginatedUsers.forEach(user => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${user.username}</td>
                    <td>
                        <span class="address-display">${user.address || 'Chưa có'}</span>
                        <input type="text" class="address-edit" style="display: none;" value="${user.address || ''}">
                    </td>
                    <td>
                        <span class="email-display">${user.email}</span>
                        <input type="email" class="email-edit" style="display: none;" value="${user.email}">
                    </td>
                    <td>
                        <button class="edit-btn" onclick="toggleEdit(this, '${user.username}')">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="save-btn" style="display: none;" onclick="saveChanges(this, '${user.username}')">
                            <i class="fas fa-save"></i>
                        </button>
                        <button class="delete-btn" onclick="deleteUser('${user.username}')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                `;
                tableBody.appendChild(row);
            });

            // Tạo phân trang
            createPagination(users.length);
        }


        function createPagination(totalUsers) {
            const totalPages = Math.ceil(totalUsers / customersPerPage);
            const paginationContainer = document.createElement('div');
            paginationContainer.className = 'pagination';
            paginationContainer.innerHTML = `
                <button onclick="changePage(1)" ${currentPage === 1 ? 'disabled' : ''}>Đầu</button>
                <button onclick="changePage(${currentPage - 1})" ${currentPage === 1 ? 'disabled' : ''}>Trước</button>
                <span>Trang ${currentPage} / ${totalPages}</span>
                <button onclick="changePage(${currentPage + 1})" ${currentPage === totalPages ? 'disabled' : ''}>Sau</button>
                <button onclick="changePage(${totalPages})" ${currentPage === totalPages ? 'disabled' : ''}>Cuối</button>
            `;

            // Xóa phân trang cũ nếu có
            const oldPagination = document.querySelector('.pagination');
            if (oldPagination) {
                oldPagination.remove();
            }

            // Thêm phân trang mới
            document.querySelector('.table-container').appendChild(paginationContainer);
        }

        function changePage(newPage) {
            currentPage = newPage;
            displayUsers(allUsers);
        }

        async function searchUser() {
            const email = document.getElementById('searchEmail').value.trim().toLowerCase();
            if (!email) {
                showMessage('Vui lòng nhập email người dùng', true);
                return;
            }

            try {
                const token = localStorage.getItem('token');
                const response = await fetch('http://localhost:3000/user-service/users', {
                    headers: {
                        'Authorization': `Bearer ${token}`
                    }
                });

                if (!response.ok) {
                    throw new Error('Không thể tải danh sách người dùng');
                }

                const users = await response.json();
                // Lọc người dùng dựa trên email
                allUsers = users.filter(user => 
                    user.email.toLowerCase().includes(email) || 
                    user.username.toLowerCase().includes(email)
                );

                if (allUsers.length === 0) {
                    showMessage('Không tìm thấy người dùng phù hợp', true);
                    return;
                }

                currentPage = 1; // Reset về trang đầu tiên khi tìm kiếm
                displayUsers(allUsers);
                showMessage(`Tìm thấy ${allUsers.length} người dùng phù hợp`, false);
            } catch (error) {
                console.error('Error:', error);
                showMessage('Lỗi khi tìm kiếm người dùng', true);
            }
        }

        function toggleEdit(btn, username) {
            const row = btn.closest('tr');
            const addressDisplay = row.querySelector('.address-display');
            const addressEdit = row.querySelector('.address-edit');
            const emailDisplay = row.querySelector('.email-display');
            const emailEdit = row.querySelector('.email-edit');
            const editBtn = row.querySelector('.edit-btn');
            const saveBtn = row.querySelector('.save-btn');

            if (addressDisplay.style.display !== 'none') {
                // Chuyển sang chế độ chỉnh sửa
                addressDisplay.style.display = 'none';
                addressEdit.style.display = 'inline';
                emailDisplay.style.display = 'none';
                emailEdit.style.display = 'inline';
                editBtn.style.display = 'none';
                saveBtn.style.display = 'inline';
            } else {
                // Hủy chỉnh sửa
                addressDisplay.style.display = 'inline';
                addressEdit.style.display = 'none';
                emailDisplay.style.display = 'inline';
                emailEdit.style.display = 'none';
                editBtn.style.display = 'inline';
                saveBtn.style.display = 'none';
            }
        }

        async function saveChanges(btn, username) {
            const row = btn.closest('tr');
            const newEmail = row.querySelector('.email-edit').value;
            const newAddress = row.querySelector('.address-edit').value;

            try {
                const token = localStorage.getItem('token');
                const response = await fetch('http://localhost:3000/user-service/admin-update', {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${token}`
                    },
                    body: JSON.stringify({
                        username: username,
                        email: newEmail,
                        address: newAddress
                    })
                });

                const result = await response.json();
                if (response.ok) {
                    showMessage('Cập nhật thông tin thành công', false);
                    loadUsers(); // Tải lại danh sách để cập nhật giao diện
                } else {
                    if (result.code === 'ER_DUP_ENTRY') {
                        showMessage('Email này đã được sử dụng bởi tài khoản khác', true);
                    } else {
                        showMessage(result.message || 'Lỗi khi cập nhật thông tin', true);
                    }
                }
            } catch (error) {
                console.error('Error:', error);
                showMessage('Lỗi khi cập nhật thông tin', true);
            }
        }

        async function deleteUser(username) {
            if (!confirm('Bạn có chắc muốn xóa người dùng này?')) {
                return;
            }

            try {
                const token = localStorage.getItem('token');
                const response = await fetch('http://localhost:3000/user-service/delete', {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${token}`
                    },
                    body: JSON.stringify({ username: username })
                });

                const result = await response.json();
                if (response.ok) {
                    showMessage('Xóa người dùng thành công', false);
                    loadUsers();
                } else {
                    showMessage(result.message || 'Lỗi khi xóa người dùng', true);
                }
            } catch (error) {
                console.error('Error:', error);
                showMessage('Lỗi khi xóa người dùng', true);
            }
        }

        function showMessage(message, isError = false) {
            const messageDiv = document.getElementById('message');
            messageDiv.textContent = message;
            messageDiv.className = isError ? 'error' : 'success';
            messageDiv.style.display = 'block';
            setTimeout(() => {
                messageDiv.style.display = 'none';
            }, 3000);
        }

        // Thêm event listener cho phím Enter trong ô tìm kiếm
        document.getElementById('searchEmail').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchUser();
            }
        });
    </script>
</body>

</html>