<form action="addStudent.php" method="POST">

<input type="text" id="firstName" name="firstName" placeholder="First Name" required>
<input type="text" id="lastName" name="lastName" placeholder="Last Name" required>
<select name="grade" required>
    <option value='' selected='selected'>--Grades--</option>;
    <option value="02 Day Preschool">2 Day Preschool</option>
    <option value="03 Day Preschool">3 Day Preschool</option>
    <option value="1st Grade">1st Grade</option> 
    <option value="2nd Grade">2nd Grade</option>  
    <option value="3rd Grade">3rd Grade</option>  
    <option value="4th Grade">4th Grade</option>  
    <option value="5th Grade">5th Grade</option>  
    <option value="6th Grade">6th Grade</option>  
    <option value="7th Grade">7th Grade</option>  
    <option value="8th Grade">8th Grade</option>     
</select>

<button type="submit" name="submit">Submit</button>
</form>