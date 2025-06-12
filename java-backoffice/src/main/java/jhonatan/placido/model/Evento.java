package jhonatan.placido.model;

public class Evento {

        private int id;
        private String titulo;
        private String descricao;
        private String data;
        private String hora;
        private String local;

        public Evento(int id, String titulo, String descricao, String data, String hora, String local) {}

        public Evento(String titulo, String descricao, String data, String hora, String local) {
            this.titulo = titulo;
            this.descricao = descricao;
            this.data = data;
            this.hora = hora;
            this.local = local;
        }


        public int getId() { return id; }
        public void setId(int id) { this.id = id; }

        public String getTitulo() { return titulo; }
        public void setTitulo(String titulo) { this.titulo = titulo; }

        public String getDescricao() { return descricao; }
        public void setDescricao(String descricao) { this.descricao = descricao; }

        public String getData() { return data; }
        public void setData(String data) { this.data = data; }

        public String getHora() { return hora; }
        public void setHora(String hora) { this.hora = hora; }

        public String getLocal() { return local; }
        public void setLocal(String local) { this.local = local; }
    }


