// dashboard
document.addEventListener("DOMContentLoaded", () => {
  fetch("../../../tugasWebP11-13/includes/userHandler.php")
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        // Menampilkan total users di dashboard
        document.getElementById("total-users").innerText = data.total_users;
      } else {
        console.error("Failed fetch data users.");
      }
    })
    .catch((error) => console.error("Error:", error));
});

//customerManage
document.addEventListener("DOMContentLoaded", () => {
  const userList = document.getElementById("user-list");
  const totalUsers = document.getElementById("total-users");
  const editUserForm = document.getElementById("editUserForm");
  const saveEditUserBtn = document.getElementById("saveEditUserBtn");

  // Fungsi untuk memuat data pengguna dari server
  function fetchUsers() {
    fetch("../../../tugasWebP11-13/includes/fetchUsers.php")
      .then((response) => response.json())
      .then((users) => {
        userList.innerHTML = ""; // Bersihkan isi tabel

        users.forEach((user) => {
          const row = document.createElement("tr");
          row.innerHTML = `
                        <td><input type="checkbox"></td>
                        <td>${user.name}</td>
                        <td>${user.phone}</td>
                        <td>${user.email}</td>
                        <td>
                            <button class="btn btn-warning btn-sm edit-btn" data-id="${user.id}"><i class="fas fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-sm delete-btn" data-id="${user.id}"><i class="fas fa-trash"></i> Delete</button>
                        </td>
                    `;
          userList.appendChild(row);
        });

        // Perbarui jumlah total pengguna
        totalUsers.textContent = users.length;

        // Tambahkan event listener ke tombol edit dan delete
        attachEventListeners();
      })
      .catch((error) => console.error("Error fetching users:", error));
  }

  // Fungsi untuk menangani klik tombol edit
  function handleEdit(event) {
    const button = event.target.closest(".edit-btn");
    if (!button) return;

    const userId = button.dataset.id;

    // Ambil detail pengguna dari server berdasarkan ID
    fetch(`../../../tugasWebP11-13/includes/fetchUsers.php?id=${userId}`)
      .then((response) => response.json())
      .then((user) => {
        if (user) {
          // Isi form modal dengan data user
          document.getElementById("edit-user-id").value = user.id;
          document.getElementById("edit-user-name").value = user.name;
          document.getElementById("edit-user-phone").value = user.phone;
          document.getElementById("edit-user-email").value = user.email;

          // Tampilkan modal edit
          const editModal = new bootstrap.Modal(
            document.getElementById("editUserModal")
          );
          editModal.show();
        } else {
          alert("User not found.");
        }
      })
      .catch((error) => {
        console.error("Error fetching user data:", error);
        alert("Failed to fetch user details. Please try again.");
      });
  }

  // Fungsi untuk menyimpan perubahan data pengguna
  saveEditUserBtn.addEventListener("click", () => {
    const formData = new FormData(editUserForm);
    fetch("../../../tugasWebP11-13/includes/editUser.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          alert("User updated successfully.");
          const editModal = bootstrap.Modal.getInstance(
            document.getElementById("editUserModal")
          );
          editModal.hide();
          fetchUsers(); // Refresh data pengguna
        } else {
          alert("Failed to update user: " + data.message);
        }
      })
      .catch((error) => {
        console.error("Error updating user:", error);
        alert("An error occurred while updating the user. Please try again.");
      });
  });

  // Fungsi untuk menangani klik tombol delete
  function handleDelete(event) {
    const button = event.target.closest(".delete-btn");
    if (!button) return;

    const userId = button.dataset.id;

    // Konfirmasi sebelum menghapus
    if (confirm("Are you sure you want to delete this user?")) {
      fetch("../../../tugasWebP11-13/includes/deleteUser.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `id=${userId}`,
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            alert("User deleted successfully.");
            fetchUsers(); // Refresh data pengguna
          } else {
            alert("Failed to delete user: " + data.message);
          }
        })
        .catch((error) => console.error("Error deleting user:", error));
    }
  }

  // Tambahkan event listener ke tombol edit dan delete
  function attachEventListeners() {
    document.querySelectorAll(".edit-btn").forEach((button) => {
      button.addEventListener("click", handleEdit);
    });

    document.querySelectorAll(".delete-btn").forEach((button) => {
      button.addEventListener("click", handleDelete);
    });
  }

  // Panggil fungsi untuk memuat data pengguna saat halaman dimuat
  fetchUsers();
});
