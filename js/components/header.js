// define o component navbar
class Header extends HTMLElement {
    constructor() {
        super();
    }

    connectedCallback() {
        this.innerHTML = `
        <div id="header">
            <button id="menubtn" onclick="nav.moveNav()"><i class="material-symbols-outlined">menu</i></button>
            <div class="social-media">
            <a href="https://www.linkedin.com/in/larissa-hey-061b7116a/">
                <i class="fa-brands fa-linkedin" ></i></a>
    
            <a href="https://github.com/heylarissa"><i class="fa-brands fa-github"></i></a>
            </div>
        </div>
        `;
    }
};
customElements.define('header-component', Header);
