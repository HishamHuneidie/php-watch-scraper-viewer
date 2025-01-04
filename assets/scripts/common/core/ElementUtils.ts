declare global {
    interface Element {
        getParentByClass(className: string): null | Element;
    }
}

Object.defineProperty(Element.prototype, 'getParentByClass', {
    enumerable: false,
    value: function (className: string): null | Element {
        let parent: Element = this.parentElement;

        while (!parent.classList.contains(className)) {
            if (parent.localName === 'body') return null;

            parent = (parent.parentElement as Element);
        }

        return parent;
    },
});

export {};