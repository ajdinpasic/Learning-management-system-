<head>
  <title>LMS</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


<style>
body {background-color: #732da5;}

</style>
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> 
</head>
<body>
<div class="container">
  

  <!-- Modal -->
  <div class="modal show" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <form method="POST" action="{{route('admin.edit_grades',["user" => $user->name,"course" => $course])}}">    
                @method('PUT')
                @csrf
          <h4 class="modal-title">Editing grade for {{$user->name}} from {{$course}}</h4>
          
        </div>
        <div class="modal-body">
          <div class="mt-4 mb-6">
          <!-- Modal title -->
          
          <!-- Modal description -->
          
        </div>
        <!-- exam form starts here -->
            
            <div
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            > 
            
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Choose the existing grade 
                </span>
                
                <select
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="examination"
                > @if($allGrades->count())
            @foreach($allGrades as $grade)
                  <option>With max grade of {{$grade->max_grade}} from {{$grade->examination}} student got {{$grade->student_grade}}</option>@endforeach 
                  <input type="hidden" name="hiddenValueGrade" id="hiddenValueGrade" value="{{$grade->id}}" />
                </select>
                
              </label>


              <br>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Type new value</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="number"
                  placeholder="20" name="student_grade"
                />
              </label>
              @error('student_grade')
                  <p style="color:red;">{{ $message }}</p>
              @enderror
              

              <div>
                <button type="submit"
                  class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                >
                  Submit
                </button>
              </div>
              @else 
              <p
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                >
                  No grades for this student
            </p> @endif
              </form>
            </div>
            <!-- exam form ends here -->
        </div>
        
      </div>
      
    </div>
  </div>
  
</div>

<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

</body>