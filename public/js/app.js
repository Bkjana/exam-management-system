

const teacher_resume = document.getElementById("teacher-resume");
// const teacher_resume=document.getElementById("teacher_resume");

// console.log(teacher_resume);
teacher_resume.hidden = true;
function openPDF() {
    if (role.value == "teacher") {
        teacher_resume.hidden = false;
    }
    else {
        teacher_resume.hidden = true;
    }
}
