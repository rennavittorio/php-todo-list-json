const { createApp } = Vue

createApp({
    data() {
        return {
            tasks: [],

            newTodo: '',

        }
    },

    methods: {
        fetchTodos(){
            axios.get('./server.php')
            .then((res)=>{
                this.tasks = res.data.data;
                console.log(res.data.data);
            })
        },
        saveTask() {
			console.log('save task', this.newTodo)

			$myVar = {
				todo: this.newTodo,
			}

			axios
				.post('./server.php', $myVar, {
					headers: {
						'Content-Type': 'multipart/form-data',
					},
				})
				.then((res) => {
					this.tasks = res.data.data;
					this.newTodo = ''
				})
				.catch((err) => {
					console.log(err)
				})
		},

        tickTask(task){
            if (task.done === 'no'){
                task.done = 'yes';
                // this.doneTasks.push(task);
                // this.tasks.splice(index, 1);

            } else {
                task.done = 'no';
                // this.tasks.push(task);
                // this.doneTasks.splice(index, 1);
            }
        },

        removeTask(index){
            this.doneTasks.splice(index, 1);
        }
    },

    computed: {
        countToBeDoneList(){
            return this.tasks.length;
        },

        countDoneList(){
            return this.doneTasks.length;
        },
    },
    mounted(){
        this.fetchTodos();
    },

}).mount('#app')