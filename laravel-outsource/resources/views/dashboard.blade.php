<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome to Autoshine: Where Excellence Meets Innovation') }}
        </h2>
    </x-slot>

    <div class="py-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                <div class="text-center mb-10">
                    <h3 class="text-3xl font-bold text-gray-700 mb-6">
                        Revolutionizing Car Care, One Vehicle at a Time
                    </h3>

                    <p class="text-lg text-gray-600 mb-12">
                        Autoshine is a pioneering force in the automotive industry, dedicated to revolutionizing the way
                        you experience car care. Our mission is to provide unparalleled service, unwavering quality, and
                        unmatched expertise, ensuring that every vehicle that passes through our doors leaves shining
                        like new.
                    </p>
                </div>

                <div class="flex flex-wrap justify-center mb-10">
                    <a href="#" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">
                        Book an Appointment
                    </a>
                    <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-4">
                        Learn More About Our Services
                    </a>
                </div>

                <div class="flex flex-wrap justify-center mb-10">
                    <div class="w-1/2 md:w-1/3 xl:w-1/4 p-6">
                        <div class="bg-white rounded shadow-md p-6">
                            <i class="fas fa-car fa-3x text-gray-500 mb-4"></i>
                            <h4 class="text-lg font-bold text-gray-700 mb-2">
                                Vehicle Inspection
                            </h4>
                            <p class="text-gray-600">
                                Get a comprehensive inspection of your vehicle to identify any issues.
                            </p>
                        </div>
                    </div>

                    <div class="w-1/2 md:w-1/3 xl:w-1/4 p-6">
                        <div class="bg-white rounded shadow-md p-6">
                            <i class="fas fa-wrench fa-3x text-gray-500 mb-4"></i>
                            <h4 class="text-lg font-bold text-gray-700 mb-2">
                                Repair and Maintenance
                            </h4>
                            <p class="text-gray-600">
                                Our expert technicians will get your vehicle running smoothly again.
                            </p>
                        </div>
                    </div>

                    <div class="w-1/2 md:w-1/3 xl:w-1/4 p-6">
                        <div class="bg-white rounded shadow-md p-6">
                            <i class="fas fa-star fa-3x text-gray-500 mb-4"></i>
                            <h4 class="text-lg font-bold text-gray-700 mb-2">
                                Premium Detailing
                            </h4>
                            <p class="text-gray-600">
                                Treat your vehicle to a luxurious detailing experience.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
