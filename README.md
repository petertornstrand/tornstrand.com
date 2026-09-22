# tornstrand.com

Personal blog and static website for Peter Törnstrand, configured for automated deployment via GitHub Pages.

---

## 🚀 Running Locally

To maximize development efficiency and eliminate local dependency friction, running via Docker is the recommended approach. Native Ruby execution is also supported.

### Option 1: Docker Compose (Recommended)

Zero-setup local environment with live polling and reloading:

```bash
# Start local development server
docker compose up
```

Open your browser at `http://localhost:4000`.

To stop the server:
```bash
docker compose down
```

---

### Option 2: Native Ruby & Bundler

If you prefer to run directly on your host machine:

#### Prerequisites
- Ruby (>= 3.3)
- Ruby C development headers and build tools:
  - **Ubuntu/Debian**: `sudo apt install build-essential ruby-dev`
  - **Fedora**: `sudo dnf install gcc make ruby-devel`
  - **macOS**: `xcode-select --install`

#### Setup & Run
1. Install dependencies locally into `vendor/bundle`:
   ```bash
   bundle config set --local path 'vendor/bundle'
   bundle install
   ```

2. Start the Jekyll server:
   ```bash
   bundle exec jekyll serve
   ```
   Or with live reloading enabled:
   ```bash
   bundle exec jekyll serve --livereload
   ```

3. Open `http://localhost:4000` in your browser.

---

## 🏗️ Building the Static Site

To generate the production-ready static assets into the `_site/` directory:

### Using Docker
```bash
docker compose run --rm jekyll jekyll build
```

### Using Bundler
```bash
bundle exec jekyll build
```

---

## 🚢 Deployment

Deployments are automated to minimize maintenance overhead:
- **GitHub Pages / Actions**: Pushing to `master` or `main` triggers `.github/workflows/pages.yml`, which builds and deploys the static site directly to GitHub Pages over HTTPS.
- **Custom Domain**: Configured via the `CNAME` file for `tornstrand.com`.
