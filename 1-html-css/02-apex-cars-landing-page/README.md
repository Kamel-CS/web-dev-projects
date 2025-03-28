# Apex Autos - Landing Page

## Basic Stuff

### Font Awesome Icons
- Go to the Font Awesome website.
- Enter you email to get a free kit.
- Copy the `<script>` tag and place it at the head of the HTML.
- Explore.

### `area-label` Attribute
Accessibility attribute used to provide a text description for elements that don’t have visible text (typically **icons** or **buttons**).
Add semantic meaning and helps screen readers.

###  `overflow-x: hidden;`
Hides horizontal scroll bar and prevents horizontal scrolling. 
- `-y`: for vertical
- `overflow:` for both

- **Important Usage:**
Hides any content that overflows the boundaries of an element.

###  `z-index: 1000;`
Controls the stacking order of elements.
A higher value means it will appear on top of lower values.
Useful when: `position: fixed;`

###  `justify-content: space-between;`
Places the first child at the start and the last one at the end, the remaining space and element are distributed evenly between them.

###  `backdrop-filter: blur(10px);`
Applies a blur effect to the area behind the element, creating a frosted glass effect, making the navigation bar semi-transparent and blurring the content behind it.

###  `gap: 1rem;`
Adds space between flex or grid items.

---

## Animations

### Slide Up
1. **Initial State**:
   - `transform: translateY(50px)` → Starts 50px below its final position.
   - `opacity: 0` → Starts invisible.

2. **Animation**:
   - `animation: slideUp 1s forwards 0.5s` → Uses the `slideUp` keyframes, lasts 1 second, starts after 0.5s delay, and **keeps the final state** (`forwards`).

3. **`@keyframes slideUp`**:
   - The `to` keyword is equivalent to `100%`.
   - At the end the element moves to its natural position (`translateY(0)`) and becomes fully visible (`opacity: 1`).
