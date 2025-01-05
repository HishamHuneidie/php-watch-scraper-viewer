import 'document-register-element';
import '@web-component/RfcItem';
import Rfc from '@context/watch/domain/Rfc';
import Modal from '@component/Modal';

const init = (e: Event): void => {

    const rfc = new Rfc(
        '/pathname',
        'New feature',
        'New Feature',
        'PHP 8.3',
        'In Voting [Passing]',
        'https://php.net/new_feature'
    );

    // language=CSS
    const modal: Modal = Modal.instance('#modal-php-net-viewer');
};

window.addEventListener('load', init);