package digiarch.online.taxicliente;

public class userPojo {

    private String direccion;
    private String referencia;
    private String otros;
    private String opcional;
    private String nombre;

    public userPojo() {

    }

    public String getNombre() {
        return nombre;
    }
    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getDireccion() {
        return direccion;
    }
    public void setDireccion(String direccion) {
        this.direccion = direccion;
    }

    public String getReferencia() {
        return referencia;
    }
    public void setReferencia(String referencia) {
        this.referencia = referencia;
    }

    public String getOpcional() {
        return opcional;
    }
    public void setOpcional(String opcional) {
        this.opcional = opcional;
    }

    public String getOtros() { return otros;}
    public void setOtros(String otros) {this.otros = otros;}

}
