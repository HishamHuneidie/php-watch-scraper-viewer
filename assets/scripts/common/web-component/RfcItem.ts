class RfcItem extends HTMLElement {
    connectedCallback() {
        console.log('Nuevo componente');

        const shadow = this.attachShadow({mode: 'open'});

        // --------------- Nodes ---------------
        // --------------- Nodes ---------------
        // --------------- Nodes ---------------

        const title = document.createElement('p');
        const type = document.createElement('p');
        const version = document.createElement('p');
        const status = document.createElement('p');
        const icon = document.createElement('i');

        console.log(this.attributes);

        title.innerHTML = this.getAttribute('data-title') ?? '';
        type.innerHTML = this.getAttribute('data-type') ?? '';
        version.innerHTML = this.getAttribute('data-version') ?? '';
        status.innerHTML = this.getAttribute('data-status') ?? '';
        icon.dataset.pathname = this.getAttribute('data-status') ?? '';
        icon.dataset.phpLink = '';

        title.setAttribute('class', 'text text-title');
        type.setAttribute('class', 'text text-type');
        version.setAttribute('class', 'text text-version');
        status.setAttribute('class', 'text text-status');

        // --------------- Styles ---------------
        // --------------- Styles ---------------
        // --------------- Styles ---------------

        const style = document.createElement('style');

        style.textContent = `
            * {
                padding: 0;
                margin: 0;
                box-sizing: border-box;
            }
            :host {
                display:inline-block;
                padding:20px 15px !important;
                background:rgba(0,0,0,.25);
                border-radius:15px;
                border-width:0 0 0 15px;
                border-style:solid;
                border-color:rgba(0,0,0,.3);
                width:300px;
                max-width:400px;
                min-width:200px;
                flex:1 1 auto;
                margin:0 10px 10px 0 !important;
                overflow:hidden;
                white-space:nowrap;
                box-shadow:0 20px 20px 7px rgba(0, 0, 0, .15);
                transition:all .2s ease;
            }
            :host(:hover) {
                transform:translateY(-5px);
            }
            
            .text {
                height:25px;
                line-height:25px;
                width:100%;
                overflow:hidden;
                text-overflow:ellipsis;
                color:rgba(255, 255, 255, .5);
            }
            .text.text-title {
                font-size:1.2rem;
                color:#fff;
                margin-bottom:10px;
            }
        `;

        // --------------- Append elements ---------------
        // --------------- Append elements ---------------
        // --------------- Append elements ---------------

        shadow.appendChild(style);
        shadow.appendChild(title);
        shadow.appendChild(type);
        shadow.appendChild(version);
        shadow.appendChild(status);
        shadow.appendChild(icon);
    }
}

// Register web component
customElements.define('rfc-item', RfcItem);