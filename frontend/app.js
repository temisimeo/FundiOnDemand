/**
 * Fundi On Demand - Global App Logic
 */

let currentEditingEventId = null;
const editModalElement = document.getElementById('editEventModal');
const editModal = editModalElement ? new bootstrap.Modal(editModalElement) : null;

// --- 1. Load Events ---
async function loadEvents() {
    const list = document.getElementById("eventList");
    if (!list) return;

    try {
        const res = await fetch("../backend/get_events.php");
        const events = await res.json();

        list.innerHTML = "";

        if (events.length === 0) {
            list.innerHTML = `<div class="alert alert-info">No events found.</div>`;
            return;
        }

        // Sort by date ascending
        events.sort((a, b) => new Date(a.date) - new Date(b.date));

        events.forEach(e => {
            const card = document.createElement("div");
            card.className = "card mb-3 shadow-sm border-0";
            card.innerHTML = `
                <div class="card-body">
                    <h5 class="card-title text-primary">${e.heading}</h5>
                    <p class="card-text text-muted">
                        <i class="bi bi-person"></i> <strong>Presenter:</strong> ${e.presenter_name}<br>
                        <i class="bi bi-calendar"></i> <strong>Date:</strong> ${e.date}<br>
                        <i class="bi bi-geo-alt"></i> <strong>Location:</strong> ${e.place}
                    </p>
                    <div class="mt-3">
                        <button class="btn btn-outline-primary btn-sm me-2" 
                            onclick="openEditModal(${e.id}, '${e.heading}', '${e.presenter_name}', '${e.date}', '${e.place}')">
                            <i class="bi bi-pencil"></i> Edit
                        </button>
                        <button class="btn btn-outline-danger btn-sm" onclick="deleteEvent(${e.id})">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </div>
                </div>
            `;
            list.appendChild(card);
        });
    } catch (err) {
        console.error("Fetch error:", err);
        list.innerHTML = `<div class="alert alert-danger">Error loading events. Is the backend running?</div>`;
    }
}

// --- 2. Edit Logic ---
function openEditModal(id, heading, presenter, date, place) {
    currentEditingEventId = id;
    document.getElementById("editHeading").value = heading;
    document.getElementById("editPresenter").value = presenter;
    document.getElementById("editDate").value = date;
    document.getElementById("editPlace").value = place;
    editModal.show();
}

async function updateEvent() {
    const updatedData = {
        id: currentEditingEventId,
        heading: document.getElementById("editHeading").value,
        presenter_name: document.getElementById("editPresenter").value,
        date: document.getElementById("editDate").value,
        place: document.getElementById("editPlace").value
    };

    try {
        const res = await fetch("../backend/update_event.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(updatedData)
        });
        
        const data = await res.json();
        
        if (data.status === "success") {
            editModal.hide();
            loadEvents();
        } else {
            alert("Update failed: " + data.message);
        }
    } catch (err) {
        alert("Server error. Check your console.");
    }
}

// --- 3. Delete Logic ---
async function deleteEvent(id) {
    if (!confirm("Are you sure you want to delete this event?")) return;

    try {
        const res = await fetch(`../backend/delete_event.php?id=${id}`);
        const data = await res.json();
        
        if (data.status === "success") {
            loadEvents();
        } else {
            alert("Delete failed: " + data.message);
        }
    } catch (err) {
        alert("Connection error.");
    }
}

// Initialize list on page load
document.addEventListener('DOMContentLoaded', loadEvents);