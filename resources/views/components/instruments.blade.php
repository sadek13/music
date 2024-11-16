
<section class="container mx-auto p-16 my-5 bg-gray-200">
    <div class="grid grid-cols-3 gap-6">
        <!-- Row 1 -->
        <div class="text-center">
            <a href="{{ route('mentors.index', ['musicTypeName' => 'guitar']) }}" class="text-gray-700 hover:text-blue-600">
                <i class="fas fa-guitar fa-3x"></i>
                <p>Guitar</p>
            </a>
        </div>
        {{-- <div class="text-center">
            <a href="{{ route('mentors.index', ['musicTypeName' => 'piano']) }}" class="text-gray-700 hover:text-blue-600">
                <i class="fas fa-piano fa-3x"></i>
                <p>Piano</p>
            </a>
        </div> --}}
        <div class="text-center">
            <a href="{{ route('mentors.index', ['musicTypeName' => 'drums']) }}" class="text-gray-700 hover:text-blue-600">
                <i class="fas fa-drum fa-3x"></i>
                <p>Drums</p>
            </a>
        </div>

        <!-- Row 2 -->
        {{-- <div class="text-center">
            <a href="{{ route('mentors.index', ['musicTypeName' => 'violin']) }}" class="text-gray-700 hover:text-blue-600">
                <i class="fas fa-violin fa-3x"></i>
                <p>Violin</p>
            </a>
        </div> --}}
        <div class="text-center">
            <a href="{{ route('mentors.index', ['musicTypeName' => 'flute']) }}" class="text-gray-700 hover:text-blue-600">
                <i class="fas fa-music fa-3x"></i> <!-- Substitute with a flute icon if available -->
                <p>Flute</p>
            </a>
        </div>
        {{-- <div class="text-center">
            <a href="{{ route('mentors.index', ['musicTypeName' => 'saxophone']) }}" class="text-gray-700 hover:text-blue-600">
                <i class="fas fa-saxophone fa-3x"></i>
                <p>Saxophone</p>
            </a>
        </div>

        <!-- Row 3 -->
        <div class="text-center">
            <a href="{{ route('mentors.index', ['musicTypeName' => 'trumpet']) }}" class="text-gray-700 hover:text-blue-600">
                <i class="fas fa-trumpet fa-3x"></i>
                <p>Trumpet</p>
            </a>
        </div>
        <div class="text-center">
            <a href="{{ route('mentors.index', ['musicTypeName' => 'cello']) }}" class="text-gray-700 hover:text-blue-600">
                <i class="fas fa-cello fa-3x"></i> <!-- Substitute with a cello icon if available -->
                <p>Cello</p>
            </a>
        </div>
        <div class="text-center">
            <a href="{{ route('mentors.index', ['musicTypeName' => 'clarinet']) }}" class="text-gray-700 hover:text-blue-600">
                <i class="fas fa-clarinet fa-3x"></i> <!-- Substitute with a clarinet icon if available -->
                <p>Clarinet</p>
            </a>
        </div> --}}
    </div>

</section>
