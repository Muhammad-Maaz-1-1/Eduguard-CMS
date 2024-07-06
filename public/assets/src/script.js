document.addEventListener('DOMContentLoaded', function() {
    var i = 1;
    var addamount = 700;

    document.getElementById('add').addEventListener('click', function() {
        var dynamicField = document.getElementById('dynamic_field');
        var rowIndex = dynamicField.querySelectorAll('tr').length;
        console.log('rowIndex: ' + rowIndex);
        console.log('amount: ' + addamount);

        var currentAmount = rowIndex * 700;
        console.log('current amount: ' + currentAmount);

        addamount += currentAmount + 700;
        console.log('amount: ' + addamount);

        i++;
        var newRow = document.createElement('tr');
        newRow.id = 'row' + i;
        newRow.innerHTML =
            '<td><input type="text" name="education_title[]" placeholder="Bachelor Degree" class="form-control title_list"/></td><td><input type="text" name="education_description[]" placeholder="Don Honorio Vectura Technological States University" class="form-control description_list"/></td><td><input type="text" name="education_date[]" placeholder="2008 - 2010" class="form-control title_date"/></td><td><button type="button" name="remove" id="' +
            i + '" class="btn btn-danger btn_remove">Remove</button></td>';

        dynamicField.appendChild(newRow);
    });

    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('btn_remove')) {
            addamount -= 700;
            console.log('amount: ' + addamount);

            var rowIndex = document.getElementById('dynamic_field').querySelectorAll('tr').length;
            addamount -= (700 * rowIndex);
            console.log(addamount);

            var buttonId = event.target.id;
            document.getElementById('row' + buttonId).remove();
        }
    });

    document.getElementById('submit').addEventListener('click', function(event) {
        event.preventDefault();
        var formdata = new FormData(document.getElementById('add_name'));
        console.log(formdata);

        fetch('action.php', {
                method: 'POST',
                body: formdata,
                cache: 'no-cache'
            })
            .then(response => response.text())
            .then(result => {
                alert(result);
                document.getElementById('add_name').reset();
            })
            .catch(error => console.error('Error:', error));
    });
});


// Experiences
document.addEventListener('DOMContentLoaded', function() {
    var i = 1;
    var addamount = 700;

    document.getElementById('experienceadd').addEventListener('click', function() {
        var dynamicField = document.getElementById('experience_dynamic_field');
        var rowIndex = dynamicField.querySelectorAll('tr').length;
        console.log('rowIndex: ' + rowIndex);
        console.log('amount: ' + addamount);

        var currentAmount = rowIndex * 700;
        console.log('current amount: ' + currentAmount);

        addamount += currentAmount + 700;
        console.log('amount: ' + addamount);

        i++;
        var newRow = document.createElement('tr');
        newRow.id = 'row' + i;
        newRow.innerHTML =
            '<td><input type="text" name="experience_title[]" placeholder="Typeface Design" class="form-control title_list"/></td>' +
            '<td><input type="text" name="experience_description[]" placeholder="Integer ultricies a turpis ac mattis. " class="form-control description_list"/></td>' +
            '<td><input type="text" name="experience_date[]" placeholder="2008 - 2010" class="form-control title_date"/></td>' +
            '<td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Remove</button></td>';

        dynamicField.appendChild(newRow);
    });

    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('btn_remove')) {
            addamount -= 700;
            console.log('amount: ' + addamount);

            var rowIndex = document.getElementById('experience_dynamic_field').querySelectorAll('tr').length;
            addamount -= (700 * rowIndex);
            console.log(addamount);

            var buttonId = event.target.id;
            document.getElementById('row' + buttonId).remove();
        }
    });

    document.getElementById('submit').addEventListener('click', function(event) {
        event.preventDefault();
        var formdata = new FormData(document.getElementById('add_name'));
        console.log(formdata);

        fetch('action.php', {
                method: 'POST',
                body: formdata,
                cache: 'no-cache'
            })
            .then(response => response.text())
            .then(result => {
                alert(result);
                document.getElementById('add_name').reset();
            })
            .catch(error => console.error('Error:', error));
    });
});


// CHAPTERS
document.addEventListener('DOMContentLoaded', function() {
    var i = 1;
    var addamount = 700;

    document.getElementById('chaptersAdd').addEventListener('click', function() {
        var dynamicField = document.getElementById('chapters_dynamic_field');
        var rowIndex = dynamicField.querySelectorAll('tr').length;
        console.log('rowIndex: ' + rowIndex);
        console.log('amount: ' + addamount);

        var currentAmount = rowIndex * 700;
        console.log('current amount: ' + currentAmount);

        addamount += currentAmount + 700;
        console.log('amount: ' + addamount);

        i++;
        var newRow = document.createElement('tr');
        newRow.id = 'row' + i;
        newRow.innerHTML =
            '<td><input type="text" name="lecture_title[]" placeholder="Lecture Title" class="form-control lecture_title"/></td>' +
            '<td><input type="file" name="lecture_video[]" class="form-control lecture_video"/></td>' +
            '<td><input type="file" name="lecture_resources[]" class="form-control lecture_resources"/></td>' +
            '<td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Remove</button></td>';

        dynamicField.appendChild(newRow);
    });

    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('btn_remove')) {
            addamount -= 700;
            console.log('amount: ' + addamount);

            var rowIndex = document.getElementById('chapters_dynamic_field').querySelectorAll('tr').length;
            addamount -= (700 * rowIndex);
            console.log(addamount);

            var buttonId = event.target.id;
            document.getElementById('row' + buttonId).remove();
        }
    });

    document.getElementById('submit').addEventListener('click', function(event) {
        event.preventDefault();
        var formdata = new FormData(document.getElementById('add_name'));
        console.log(formdata);

        fetch('action.php', {
                method: 'POST',
                body: formdata,
                cache: 'no-cache'
            })
            .then(response => response.text())
            .then(result => {
                alert(result);
                document.getElementById('add_name').reset();
            })
            .catch(error => console.error('Error:', error));
    });
});

    // new chapter add
    document.addEventListener('DOMContentLoaded', function() {
        var chapterIndex = 1;

        // Event listener for adding new chapters
        document.getElementById('newchaptersAdd').addEventListener('click', function() {
            var dynamicField = document.getElementById('new_chapters_dynamic_field');
            var chapterId = 'chapter' + chapterIndex;

            var newRow = document.createElement('tr');
            newRow.id = chapterId;
            newRow.innerHTML =
                '<td><input type="text" name="chapter_heading[]" placeholder="Chapter Heading" class="form-control chapter_heading"/></td>' +
                '<td><button type="button" name="remove" data-chapter-id="' + chapterId + '" class="btn btn-danger btn_remove">Remove</button>' +
                '<button type="button" name="newchapterslectureAdd" data-chapter-id="' + chapterId + '" class="btn btn-primary newchapterslectureAdd">Add Lecture</button></td>';

            dynamicField.appendChild(newRow);
            chapterIndex++;
        });

        // Event listener for adding new lectures (using event delegation)
        document.getElementById('new_chapters_dynamic_field').addEventListener('click', function(event) {
            if (event.target && event.target.classList.contains('newchapterslectureAdd')) {
                var chapterId = event.target.getAttribute('data-chapter-id');
                var dynamicField = document.getElementById('new_lecture_dynamic_field');
                var lectureRowIndex = dynamicField.querySelectorAll('.' + chapterId).length;
                var lectureId = chapterId + '-lecture' + lectureRowIndex;

                var newRow = document.createElement('tr');
                newRow.id = lectureId;
                newRow.classList.add(chapterId); // Add chapter id as class for easy removal
                newRow.innerHTML =
                    '<td><input type="text" name="lecture_title[]" placeholder="Lecture Title" class="form-control lecture_title"/></td>' +
                    '<td><input type="file" name="lecture_video[]" class="form-control lecture_video"/></td>' +
                    '<td><input type="file" name="lecture_resources[]" class="form-control lecture_resources"/></td>' +
                    '<td><button type="button" name="remove" id="' + lectureId + '" class="btn btn-danger btn_remove">Remove</button></td>';

                dynamicField.appendChild(newRow);
            }
        });

        // Event listener for removing rows
        document.getElementById('new_chapters_dynamic_field').addEventListener('click', function(event) {
            if (event.target && event.target.classList.contains('btn_remove')) {
                var chapterId = event.target.getAttribute('data-chapter-id');

                // Remove the chapter row
                document.getElementById(chapterId).remove();

                // Remove all lecture rows associated with this chapter
                var lectureRows = document.querySelectorAll('.' + chapterId);
                lectureRows.forEach(function(row) {
                    row.remove();
                });
            }
        });
    });

