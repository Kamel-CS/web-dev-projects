# HTML CSS Simple Login From

### Quick Notes

- **Input attributes:**
  -  `name`: for the backend.
  - `id`: for DOM.

- **SVGs are Better than PNGs**:
  - Can be manipulated using HTML (e.g., dimensions, colors).
  - Provides an `<svg>` element.
  - The `for` attribute of the `<label>` should match the `id` attribute of the `<input>`, so clicking the icon is just like clicking the input.
  - `fill` attribute to provide a color.

- **Borders have 4 dimensions:**
For a border we can specify different attributes for each side (top, bottom, right, left)

- Focused inputs have a visible outline, to remove it: `outline: none`.

---

### Hover Animation Trick
Make the border of the form same as it's background (i.e., `none` effect but sill being applied), and when hovered over change the border's color to the desired one.

---

### Selectors

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
