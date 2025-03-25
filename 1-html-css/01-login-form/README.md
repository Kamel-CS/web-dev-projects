# Notes

- **Input attributes:**
  -  `name`: for the backend.
  - `id`: for DOM.

- **SVGs are Better than PNGs**:
  - Can be manipulated using HTML.
  - Provides an `<svg>` element.
  - The `for` attribute of the `label` should match the `id`, so clicking the icon is just like clicking the input.
  - `fill` attribute to provide a color.

- **Borders have 4 dimesions:**
For a border we can specify different attributes for each side (top, bottom, right, left)

---

### Hover Animation Trick
Make the border of the form same color as its background and when hovered over change the border color to the desired one for the effect.

---

### CSS Variables
- Starts with `--`
```css
:root {
    --accent-color: #084c61;
    --base-color: #fff;
    --text-color: #2e2b41;
    --input-color: #f3f0ff;
}

body {
    background-color: var(--base-color);
}
```
`:root` is pseudo class that represents the `<html>` element. Used to define global variables.

---

## Selectors

- **Directed vs Undirected Child:**
```html
<form>
    <div>Direct child</div>
    <div>
        <ul>
            <div>Nested div inside ul</div>
        </ul>
    </div>
</form>
```

```css
form div {
    /* This will select all div elements inside the from */
}

form > div {
    /* This will only select the direct div elements */
}
```

- **Has Selector:**
```css
div:has(input:focus) > label {
    background-color: var(--text-color);
}
```
This selects a parent `div` that contains an input element that is currently focused (i.e., the user has clicked on it or tabbed into it).
