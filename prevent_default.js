function preventDefault(){
    if (document.getElementById('title').value === ""){
        document.getElementById('title').style.backgroundColor = "rgb(225, 60, 60)";
        document.getElementById('title').style.borderColor = "rgb(225, 60, 60)";
    }
    else{
        document.getElementById('title').style.backgroundColor = "rgb(34, 50, 79)";
        document.getElementById('title').style.borderColor = "rgb(34, 50, 79)";
    }
    if (document.getElementById('blog').value === ""){
        document.getElementById('blog').style.backgroundColor = "rgb(225, 60, 60)";
        document.getElementById('blog').style.borderColor = "rgb(225, 60, 60)";
    }
    else{
        document.getElementById('blog').style.backgroundColor = "rgb(34, 50, 79)";
        document.getElementById('blog').style.borderColor = "rgb(34, 50, 79)";
    }
}
