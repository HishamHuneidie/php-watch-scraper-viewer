import Rfc from '@context/watch/domain/Rfc.ts';

console.log('ini: context=Rfc');

const init = (e: Event): void => {

    const rfc = new Rfc(
        '/pathname',
        'New feature',
        'New Feature',
        'PHP 8.3',
        'In Voting [Passing]',
        'https://php.net/new_feature'
    );

    console.log('log:', rfc);
};

window.addEventListener('load', init);