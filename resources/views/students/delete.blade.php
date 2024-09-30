<form action="{{ route('students.destroy', $student->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
</form>