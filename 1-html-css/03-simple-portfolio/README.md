### `box-shadow`: Glow Effect
Adds shadow effects to elements for depth or glow.
```css
  box-shadow: [horizontal] [vertical] [blur] [spread] [color];
  box-shadow: 0 0 25px var(--accent-color); /* Glow effect */
```

---

### `transition`
Smoothly animates property changes (e.g., hover effects).  
```css
  transition: [property] [duration] [timing-function] [delay];
  transition: transform 0.6s ease;
```  

---

### `display: inline-block`
Hybrid of `inline` and `block`—flows in a line but respects `width/height`.

**Why Use It?**  
- Lets pseudo-elements (like `::after` for the cursor) align properly with text.  
- Unlike `inline`, it respects `margin-top/bottom` and `padding`.  

---

### Animated Cursor & Text Swapping
1. **Text Animation (`content` + `@keyframes`)**  
   - `content` changes every 4s (20s total / 5 phrases).  
```css
  .home__dynamic-text::before {
      content: "Software Engineer"; /* Default text */
      animation: words 20s infinite; /* Cycles through texts */
  }

  @keyframes words {
      0%, 20% { content: "Web Developer"; }
      21%, 40% { content: "Software Engineer"; }
      /* ... */
  }
```  

2. **Blinking Cursor (`::after` + `@keyframes`)**  
   - Absolute positioning aligns it to the end of `.home__dynamic-text`.  
   - `opacity` toggle creates a blinking effect.  
```css
.home__dynamic-text::after {
    content: "";
    position: absolute;
    right: -8px; /* Places cursor at text end */
    animation: cursor 0.6s infinite; /* Blink effect */
}

@keyframes cursor {
    0%, 100% { opacity: 1; } /* Visible */
    50% { opacity: 0; } /* Hidden */
}
```  
