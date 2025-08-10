<template>
  <div class="student-panel">
    <header class="panel-header">
      <img src="https://your‑server.com/logo.png" alt="Universidad Tecnológica Fidel Velázquez" class="logo" />
      <h1>Panel de Alumnos</h1>
    </header>

    <div class="controls">
      <input v-model="filter" placeholder="Buscar alumno..." />
      <button @click="newStudent()">Agregar alumno</button>
    </div>

    <ul class="student-list">
      <li v-for="(stu, index) in filteredStudents" :key="stu.id">
        <input v-model="stu.name" @blur="updateStudent(stu)" />
        <button @click="removeStudent(index)">❌</button>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'StudentPanel',
  data() {
    return {
      filter: '',
      students: [
        { id: 1, name: 'Ana García' },
        { id: 2, name: 'Luis Pérez' },
        { id: 3, name: 'María López' },
      ],
      nextId: 4,
    };
  },
  computed: {
    filteredStudents() {
      const f = this.filter.trim().toLowerCase();
      return f
        ? this.students.filter(s => s.name.toLowerCase().includes(f))
        : this.students;
    },
  },
  methods: {
    newStudent() {
      this.students.push({ id: this.nextId++, name: '' });
    },
    removeStudent(idx) {
      this.students.splice(idx, 1);
    },
    updateStudent(stu) {
      // Aquí podrías llamar una API para guardar cambios
      console.log('Alumno actualizado:', stu);
    },
  },
};
</script>

<style scoped>
.student-panel {
  max-width: 600px;
  margin: 32px auto;
  font-family: sans-serif;
  border: 1px solid #ddd;
  border-radius: 8px;
  padding: 16px;
}
.panel-header {
  display: flex;
  align-items: center;
  gap: 16px;
  margin-bottom: 16px;
}
.logo {
  width: 60px;
  height: auto;
}
.controls {
  display: flex;
  gap: 8px;
  margin-bottom: 16px;
}
.student-list {
  list-style: none;
  padding: 0;
}
.student-list li {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 8px 0;
  border-bottom: 1px solid #eee;
}
.student-list li input {
  flex: 1;
  padding: 4px;
}
.student-list li button {
  background: none;
  border: none;
  cursor: pointer;
}
</style>
