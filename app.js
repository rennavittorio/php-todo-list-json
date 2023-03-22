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

        tickTask(task, index){
            console.log('trig tick');
            let isDone = 'yes';
            if (task.done === 'no'){
                isDone = 'yes';

            } else {
                isDone = 'no';
            }

            $myVar = {
				toChangeIndex: index,
                toChangeStatus: isDone,

			}

			axios
				.post('./server.php', $myVar, {
					headers: {
						'Content-Type': 'multipart/form-data',
					},
				})
				.then((res) => {
					this.tasks = res.data.data;
				})
				.catch((err) => {
					console.log(err)
				})

        },

        removeTask(index){
            console.log('trig del');
            console.log(index);

            $myVar = {
				toDel: index,
			}

			axios
				.post('./server.php', $myVar, {
					headers: {
						'Content-Type': 'multipart/form-data',
					},
				})
				.then((res) => {
					this.tasks = res.data.data;
				})
				.catch((err) => {
					console.log(err)
				})
        }
    },

    mounted(){
        this.fetchTodos();
    },

}).mount('#app')