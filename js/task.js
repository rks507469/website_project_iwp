const taskinput = document.querySelector("#inputTask");
const taskdesc = document.querySelector("#inputDesc");
const TaskTableElement = document.querySelector("#TaskTable");

//adding task
let allTasks = [];

function createNewTask() {
    const taskItem = {};
    //taking the values from the inputs
    const taskH = taskinput.value;
    const taskD = taskdesc.value;
    //checking if the details are not empty
    if(taskH != "" && taskD != "") {
        //remove the in-valid labels if present
        taskinput.classList.remove('is-invalid');
        taskdesc.classList.remove('is-invalid');
        //put the values into object
        taskItem.head = taskH;
        taskItem.desc = taskD;
        taskItem.moment = new Date();
        //put object into array
        allTasks.push(taskItem);
        //update the list View
        renderListView(allTasks);
        taskinput.value = "";
        taskdesc.value = "";
    } else {
        taskinput.classList.add('is-invalid');
        taskdesc.classList.add('is-invalid');
    }
}

//event listner on the button
const elem = document.querySelector("#btnAddTask");
elem.addEventListener("click", createNewTask, false);


//creating a HTML part of task list
function createTaskList({head, desc, moment}) {
    return `
        <li class="list-group-item d-flex justify-content-between">
            <div class="d-flex flex-column">
                ${head}
                <span class="px=5 text-muted">
                    ${desc}
                </span>
            </div>
            <div>
                <small class="text-muted pr-3">${getDateString(moment)}</small>
                <button type="button" class="btn btn-outline-danger btn-sm" onclick="deleteItem(${moment.valueOf()})">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
        </li>
    `;
}

//function to get date
function getDateString(moment) {
    return moment.toLocaleDateString("en-IN", {year:'numeric', month:'long', day:'numeric'});
}

//deleteItem
function deleteItem(dateValue) {
    let newArr = [];
    for(let i = 0; i < allTasks.length; i++) {
        if(allTasks[i].moment.valueOf() !== dateValue) {
            newArr.push(allTasks[i]);
        }
    }
    renderListView(newArr);
} 

//render list view
function renderListView(arrayOfList) {
    const allTaskHTML = arrayOfList.map(task => createTaskList(task));
    const joinedAllTaskHTML = allTaskHTML.join("");
    TaskTableElement.innerHTML = joinedAllTaskHTML;
    allTasks = arrayOfList;
}



//date for the heading
const heaingDate  = document.querySelector("#today");
heaingDate.innerHTML = getToday(new Date());
function getToday(moment) {
    return moment.toLocaleDateString("en-IN", {year:'numeric', month:'long', day:'numeric', weekday: 'long'});
}