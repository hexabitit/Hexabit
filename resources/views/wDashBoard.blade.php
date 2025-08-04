<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HexaBit Admin Dashboard</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Firebase SDK -->
    <script src="https://www.gstatic.com/firebasejs/9.6.10/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.6.10/firebase-auth-compat.js"></script>
    <style>
        .loading-spinner {
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Login Screen -->
    <div id="loginScreen" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-90 z-50">
        <div class="bg-white rounded-lg shadow-xl p-8 w-full max-w-md">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800">Admin Login</h2>
                <p class="text-gray-600 mt-2">Enter your credentials to access the dashboard</p>
            </div>
            
            <form id="loginForm" class="space-y-6">
                <div>
                    <label for="loginEmail" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="loginEmail" required 
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div>
                    <label for="loginPassword" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" id="loginPassword" required 
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox" id="rememberMe" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="rememberMe" class="ml-2 block text-sm text-gray-700">Remember me</label>
                    </div>
                    
                    <a href="#" id="forgotPassword" class="text-sm text-blue-600 hover:text-blue-500">Forgot password?</a>
                </div>
                
                <button type="submit" id="loginBtn" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-lg transition duration-200">
                    Sign In
                </button>
                
                <div id="loginError" class="text-red-500 text-sm text-center hidden"></div>
            </form>
        </div>
    </div>

    <!-- Dashboard (hidden by default) -->
    <div id="dashboard" class="container mx-auto px-4 py-8 hidden">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-500 to-purple-600 p-6 text-white flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold">Firebase Text Data Platform</h1>
                    <p class="text-blue-100">View and manage text submissions from your database</p>
                </div>
                <button id="logoutBtn" class="bg-white bg-opacity-20 hover:bg-opacity-30 px-4 py-2 rounded-lg transition">
                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                </button>
            </div>

            <!-- Main Content -->
            <div class="p-6">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-blue-50 rounded-lg p-4 border border-blue-100">
                        <div class="flex items-center">
                            <div class="bg-blue-100 p-3 rounded-full mr-4">
                                <i class="fas fa-database text-blue-600"></i>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm">Total Submissions</p>
                                <h3 class="text-2xl font-bold" id="totalSubmissions">0</h3>
                            </div>
                        </div>
                    </div>
                    <div class="bg-green-50 rounded-lg p-4 border border-green-100">
                        <div class="flex items-center">
                            <div class="bg-green-100 p-3 rounded-full mr-4">
                                <i class="fas fa-clock text-green-600"></i>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm">Last Submission</p>
                                <h3 class="text-2xl font-bold" id="lastSubmission">None</h3>
                            </div>
                        </div>
                    </div>
                    <div class="bg-purple-50 rounded-lg p-4 border border-purple-100">
                        <div class="flex items-center">
                            <div class="bg-purple-100 p-3 rounded-full mr-4">
                                <i class="fas fa-users text-purple-600"></i>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm">Unique Users</p>
                                <h3 class="text-2xl font-bold" id="uniqueUsers">0</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Search and Filter -->
                <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
                    <div class="relative w-full md:w-64">
                        <input type="text" id="searchInput" placeholder="Search submissions..." 
                               class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                    <div class="flex gap-2">
                        <select id="filterField" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="name">Name</option>
                            <option value="email">Email</option>
                            <option value="service">Service</option>
                        </select>
                        <button id="exportBtn" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition">
                            <i class="fas fa-file-export mr-2"></i>Export
                        </button>
                    </div>
                </div>

                <!-- Data Table -->
                <div class="overflow-x-auto rounded-lg border border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="dataTable" class="bg-white divide-y divide-gray-200">
                            <!-- Data will be inserted here by JavaScript -->
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="flex justify-between items-center mt-4">
                    <div class="text-sm text-gray-500" id="paginationInfo">Showing 0 to 0 of 0 entries</div>
                    <div class="flex gap-2">
                        <button id="prevPage" class="px-4 py-2 border rounded-lg disabled:opacity-50" disabled>Previous</button>
                        <button id="nextPage" class="px-4 py-2 border rounded-lg disabled:opacity-50" disabled>Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- View Modal -->
    <div id="viewModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg p-6 max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">Submission Details</h3>
                <button id="closeModal" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div id="modalContent" class="space-y-4">
                <!-- Content will be inserted here -->
            </div>
        </div>
    </div>

    <!-- Password Reset Modal -->
    <div id="resetModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">Reset Password</h3>
                <button id="closeResetModal" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="space-y-4">
                <div>
                    <label for="resetEmail" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input type="email" id="resetEmail" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div id="resetError" class="text-red-500 text-sm hidden"></div>
                <button id="sendResetBtn" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-lg transition">
                    Send Reset Link
                </button>
                <div id="resetSuccess" class="text-green-500 text-sm hidden">
                    Password reset email sent! Please check your inbox.
                </div>
            </div>
        </div>
    </div>

    <script>
        // Firebase configuration
        const firebaseConfig = {
            apiKey: "AIzaSyAVnIlmFWj-NMEToWMVl0ezMELDqQpGzOM",
            authDomain: "hexabit-6464d.firebaseapp.com",
            projectId: "hexabit-6464d",
            storageBucket: "hexabit-6464d.appspot.com",
            messagingSenderId: "293920464527",
            appId: "1:293920464527:web:f024f18edbf19e1a629afa",
            measurementId: "G-S1D68KWBQ2"
        };

        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        const db = firebase.firestore();
        const auth = firebase.auth();

        // DOM Elements
        const loginScreen = document.getElementById('loginScreen');
        const dashboard = document.getElementById('dashboard');
        const loginForm = document.getElementById('loginForm');
        const loginError = document.getElementById('loginError');
        const loginBtn = document.getElementById('loginBtn');
        const logoutBtn = document.getElementById('logoutBtn');
        const dataTable = document.getElementById('dataTable');
        const totalSubmissions = document.getElementById('totalSubmissions');
        const lastSubmission = document.getElementById('lastSubmission');
        const uniqueUsers = document.getElementById('uniqueUsers');
        const searchInput = document.getElementById('searchInput');
        const filterField = document.getElementById('filterField');
        const prevPage = document.getElementById('prevPage');
        const nextPage = document.getElementById('nextPage');
        const paginationInfo = document.getElementById('paginationInfo');
        const viewModal = document.getElementById('viewModal');
        const modalContent = document.getElementById('modalContent');
        const closeModal = document.getElementById('closeModal');
        const exportBtn = document.getElementById('exportBtn');
        const forgotPassword = document.getElementById('forgotPassword');
        const resetModal = document.getElementById('resetModal');
        const resetEmail = document.getElementById('resetEmail');
        const resetError = document.getElementById('resetError');
        const resetSuccess = document.getElementById('resetSuccess');
        const sendResetBtn = document.getElementById('sendResetBtn');
        const closeResetModal = document.getElementById('closeResetModal');

        // Variables
        let allData = [];
        let filteredData = [];
        let currentPage = 1;
        const itemsPerPage = 10;
        let uniqueEmails = new Set();
        let unsubscribeContacts = null;

        // Check authentication state
        auth.onAuthStateChanged(user => {
            if (user) {
                // User is signed in (any authenticated user is considered admin)
                loginScreen.classList.add('hidden');
                dashboard.classList.remove('hidden');
                fetchData();
            } else {
                // No user is signed in
                loginScreen.classList.remove('hidden');
                dashboard.classList.add('hidden');
            }
        });

        // Login function
        loginForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const email = document.getElementById('loginEmail').value;
            const password = document.getElementById('loginPassword').value;
            const rememberMe = document.getElementById('rememberMe').checked;
            
            loginError.classList.add('hidden');
            loginBtn.disabled = true;
            loginBtn.innerHTML = 'Signing in... <i class="fas fa-spinner loading-spinner ml-2"></i>';

            try {
                // Set persistence based on "Remember me" checkbox
                const persistence = rememberMe ? 
                    firebase.auth.Auth.Persistence.LOCAL : 
                    firebase.auth.Auth.Persistence.SESSION;
                
                await auth.setPersistence(persistence);
                await auth.signInWithEmailAndPassword(email, password);
            } catch (error) {
                loginError.textContent = getFriendlyError(error.code);
                loginError.classList.remove('hidden');
            } finally {
                loginBtn.disabled = false;
                loginBtn.innerHTML = 'Sign In';
            }
        });

        // Logout function
        logoutBtn.addEventListener('click', () => {
            auth.signOut();
            if (unsubscribeContacts) {
                unsubscribeContacts();
            }
        });

        // Fetch data from Firestore
        function fetchData() {
            unsubscribeContacts = db.collection('contact')
                .orderBy('created_at', 'desc')
                .onSnapshot((snapshot) => {
                    allData = [];
                    uniqueEmails = new Set();
                    let count = 0;
                    let lastDate = 'None';

                    snapshot.forEach((doc) => {
                        const data = doc.data();
                        data.id = doc.id;
                        allData.push(data);
                        uniqueEmails.add(data.email);
                        count++;
                        
                        // Get the most recent date
                        if (lastDate === 'None' || data.created_at > lastDate) {
                            lastDate = data.created_at;
                        }
                    });

                    // Update stats
                    totalSubmissions.textContent = count;
                    uniqueUsers.textContent = uniqueEmails.size;
                    if (lastDate !== 'None') {
                        lastSubmission.textContent = formatFirestoreDate(lastDate);
                    }

                    // Initial data display
                    filterData();
                }, (error) => {
                    console.error("Error fetching contacts:", error);
                });
        }

        // Format Firestore timestamp
        function formatFirestoreDate(timestamp) {
            if (!timestamp) return 'N/A';
            if (timestamp.toDate) {
                return timestamp.toDate().toLocaleString();
            }
            return new Date(timestamp).toLocaleString();
        }

        // Filter and display data
        function filterData() {
            const searchTerm = searchInput.value.toLowerCase();
            const filterBy = filterField.value;

            filteredData = allData.filter(item => {
                if (!item[filterBy]) return false;
                return item[filterBy].toString().toLowerCase().includes(searchTerm);
            });

            // Reset to first page when filtering
            currentPage = 1;
            displayData();
        }

        // Display data in table with pagination
        function displayData() {
            dataTable.innerHTML = '';
            
            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;
            const paginatedData = filteredData.slice(startIndex, endIndex);
            
            if (paginatedData.length === 0) {
                dataTable.innerHTML = `
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">No submissions found</td>
                    </tr>
                `;
            } else {
                paginatedData.forEach(item => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td class="px-6 py-4 whitespace-nowrap">${item.name || 'N/A'}</td>
                        <td class="px-6 py-4 whitespace-nowrap">${item.email || 'N/A'}</td>
                        <td class="px-6 py-4 whitespace-nowrap">${item.subject || 'N/A'}</td>
                        <td class="px-6 py-4 max-w-xs truncate">${item.message || 'N/A'}</td>
                        <td class="px-6 py-4 whitespace-nowrap">${formatFirestoreDate(item.created_at)}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <button onclick="viewDetails('${item.id}')" class="text-blue-500 hover:text-blue-700 mr-3">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button onclick="deleteSubmission('${item.id}')" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    `;
                    dataTable.appendChild(row);
                });
            }

            // Update pagination controls
            updatePagination();
        }

        // Update pagination info and buttons
        function updatePagination() {
            const totalItems = filteredData.length;
            const totalPages = Math.ceil(totalItems / itemsPerPage);
            const startItem = ((currentPage - 1) * itemsPerPage) + 1;
            const endItem = Math.min(currentPage * itemsPerPage, totalItems);

            paginationInfo.textContent = `Showing ${startItem} to ${endItem} of ${totalItems} entries`;
            
            prevPage.disabled = currentPage === 1;
            nextPage.disabled = currentPage === totalPages || totalPages === 0;
        }

        // View submission details
        window.viewDetails = function(id) {
            const submission = allData.find(item => item.id === id);
            if (submission) {
                modalContent.innerHTML = `
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">Name</p>
                            <p class="font-medium">${submission.name || 'N/A'}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Email</p>
                            <p class="font-medium">${submission.email || 'N/A'}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Subject</p>
                            <p class="font-medium">${submission.subject || 'N/A'}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Date</p>
                            <p class="font-medium">${formatFirestoreDate(submission.created_at)}</p>
                        </div>
                        <div class="md:col-span-2">
                            <p class="text-sm text-gray-500">Message</p>
                            <p class="font-medium whitespace-pre-line">${submission.message || 'N/A'}</p>
                        </div>
                    </div>
                `;
                viewModal.classList.remove('hidden');
            }
        };

        // Delete submission
        window.deleteSubmission = function(id) {
            if (confirm('Are you sure you want to delete this submission?')) {
                db.collection('contact').doc(id).delete()
                    .then(() => {
                        alert('Submission deleted successfully');
                    })
                    .catch(error => {
                        alert('Error deleting submission: ' + error.message);
                    });
            }
        };

        // Export data to CSV
        exportBtn.addEventListener('click', () => {
            if (filteredData.length === 0) {
                alert('No data to export');
                return;
            }

            let csv = 'Name,Email,Subject,Message,Date\n';
            
            filteredData.forEach(item => {
                csv += `"${item.name || ''}","${item.email || ''}","${item.subject || ''}","${item.message || ''}","${formatFirestoreDate(item.created_at)}"\n`;
            });

            const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
            const url = URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.setAttribute('href', url);
            link.setAttribute('download', `submissions_${new Date().toISOString().slice(0,10)}.csv`);
            link.style.visibility = 'hidden';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });

        // Forgot password functionality
        forgotPassword.addEventListener('click', (e) => {
            e.preventDefault();
            resetModal.classList.remove('hidden');
            resetError.classList.add('hidden');
            resetSuccess.classList.add('hidden');
            resetEmail.value = document.getElementById('loginEmail').value || '';
        });

        closeResetModal.addEventListener('click', () => {
            resetModal.classList.add('hidden');
        });

        sendResetBtn.addEventListener('click', async () => {
            const email = resetEmail.value.trim();
            
            if (!email) {
                resetError.textContent = 'Please enter an email address';
                resetError.classList.remove('hidden');
                return;
            }

            resetError.classList.add('hidden');
            resetSuccess.classList.add('hidden');
            sendResetBtn.disabled = true;
            sendResetBtn.innerHTML = 'Sending... <i class="fas fa-spinner loading-spinner ml-2"></i>';

            try {
                await auth.sendPasswordResetEmail(email);
                resetSuccess.classList.remove('hidden');
                resetEmail.value = '';
            } catch (error) {
                resetError.textContent = getFriendlyError(error.code);
                resetError.classList.remove('hidden');
            } finally {
                sendResetBtn.disabled = false;
                sendResetBtn.innerHTML = 'Send Reset Link';
            }
        });

        // Helper function to convert Firebase error codes to user-friendly messages
        function getFriendlyError(errorCode) {
            switch(errorCode) {
                case 'auth/invalid-email':
                    return 'Please enter a valid email address.';
                case 'auth/user-disabled':
                    return 'This account has been disabled.';
                case 'auth/user-not-found':
                    return 'No account found with this email.';
                case 'auth/wrong-password':
                    return 'Incorrect password. Please try again.';
                case 'auth/too-many-requests':
                    return 'Too many attempts. Please try again later.';
                default:
                    return 'Login failed. Please try again.';
            }
        }
    </script>
</body>
</html>