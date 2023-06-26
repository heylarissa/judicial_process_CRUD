// define o component navbar
class Navbar extends HTMLElement {
    constructor(open) {
        super();
        this.open = open;
    }

    connectedCallback() {
        this.innerHTML = `
        <div class="sidebar">
            <a href="./index.html"><i class="material-symbols-outlined iconsize">home</i>Home</a>
            <a href="./about.html"><i class="material-symbols-outlined">location_away</i>About</a>
            <a href="./form.html"><i class="material-symbols-outlined">contact_page</i>Contact</a>
        </div>
    `;
    }

    openNav() {
        document.getElementById("sidebar").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        document.getElementById("main").style.width = "calc(100% - 250px)";
        document.getElementById("sidebar").style.height = "400px";

    }
    closeNav() {
        document.getElementById("sidebar").style.width = "0";
        document.getElementById("sidebar").style.height = "0";

        document.getElementById("main").style.marginLeft = "0";
        document.getElementById("main").style.width = "100%";

    }
    moveNav() {
        this.open = !this.open;
        if (this.open){
            this.openNav()
        }
        else {
            this.closeNav()
        }
    }

    
};
customElements.define('navbar-component', Navbar);
var nav = new Navbar(false);

