<!-- Dashboard Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <!-- Today Views -->
    <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-blue-100 text-sm font-medium mb-1">
                    <i class="fa fa-arrow-up mr-1"></i> Today Views
                </p>
                <h3 class="text-3xl font-bold">22,520</h3>
            </div>
            <div class="bg-blue-400 bg-opacity-30 rounded-full p-4">
                <i class="fa fa-bar-chart text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- Earnings -->
    <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-lg shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-green-100 text-sm font-medium mb-1">
                    <i class="fa fa-arrow-up mr-1"></i> Earnings
                </p>
                <h3 class="text-3xl font-bold">22,520</h3>
            </div>
            <div class="bg-green-400 bg-opacity-30 rounded-full p-4">
                <i class="fa fa-usd text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- Users -->
    <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-purple-100 text-sm font-medium mb-1">
                    <i class="fa fa-arrow-up mr-1"></i> Users
                </p>
                @php $Users = App\Models\User::all(); @endphp
                <h3 class="text-3xl font-bold">{{ count($Users) }}</h3>
            </div>
            <div class="bg-purple-400 bg-opacity-30 rounded-full p-4">
                <i class="fa fa-address-card-o text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- Enquiries -->
    <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-orange-100 text-sm font-medium mb-1">
                    <i class="fa fa-arrow-up mr-1"></i> Enquiry
                </p>
                @php $Message = App\Models\Message::all(); @endphp
                <h3 class="text-3xl font-bold">{{ count($Message) }}</h3>
            </div>
            <div class="bg-orange-400 bg-opacity-30 rounded-full p-4">
                <i class="fa fa-envelope-open-o text-2xl"></i>
            </div>
        </div>
    </div>
</div>
